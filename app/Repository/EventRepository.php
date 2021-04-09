<?php

namespace App\Repository;

use App\Models\Event;
use App\Repository\Interfaces\EventRepositoryInterface;
use Illuminate\Support\Facades\DB;

class EventRepository extends BaseRepository implements EventRepositoryInterface
{
    /**
     * Event Repository constructor.
     */
    public function __construct(Event $model)
    {
        parent::__construct($model);
    }

    /**
     * Get Event with Relation
     */
    public function get()
    {
        return $this->relationshipWith([
            'organiser',
            'facilitator',
            'coordinator',
            'event_category',
        ]);
    }

    /**
     * Get event with relation and total participants
     */
    public function eventWithParticipants()
    {
        return $this->relationWithCount(['organiser', 'facilitator','coordinator', 'event_category'], ['participant']);
    }

    /**
     *  Create new event
     */
    public function create($request)
    {
        DB::beginTransaction();
        try {
            $event = $this->model->create($request);
            $this->organiser($event,$request['organisers']);
            $this->facilitator($event,$request['facilitators']);
            $this->coordinator($event,$request['coordinators']);
            //$this->pivotRelation($event,$request);
            DB::commit();
            return true;
        }
        catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    /**
     * Update existing event
     */
    public function updating($id, $request)
    {
        DB::beginTransaction();
        try {
            $event = $this->find($id); //Find the Event
            $this->update($id, $request); //Binding the request to event model attributes
            $event->save(); //Update the event
            $this->organiser($event,$request['organisers'],true);
            $this->facilitator($event,$request['facilitators'],true);
            $this->coordinator($event,$request['coordinators'],true);
            DB::commit();
            return true;
        }
        catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }


    /**
     * Manage Event Organiser
     */
    private function organiser($event, $request, $update = null)
    {
        if(!is_null($update)) {
            return $event->organiser()->sync($request);
        }
        else {
            return $event->organiser()->attach($request);
        }
    }

    /**
     * Manage Event Facilitator
     */
    private function facilitator($event , $request, $update = null)
    {
        if(!is_null($update)) {
            return $event->facilitator()->sync($request);
        }
        else {
            return $event->facilitator()->attach($request);
        }
    }

    /**
     * Manage Event Facilitator
     */
    private function coordinator($event , $request, $update = null)
    {
        if(!is_null($update)) {
            return $event->coordinator()->sync($request);
        }
        else {
            return $event->coordinator()->attach($request);
        }
    }

    /**
     * Get Name and Event Duration
     */
    public function getNameAndDuration()
    {
        return $this->model->select('name','start_date','end_date')->get();
    }

}
