<?php

namespace App\Repositories;

use App\Models\Event;
use Illuminate\Support\Facades\DB;

class EventRepository extends BaseRepository
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
    public function withRelation()
    {
        return $this->getWithRelation([
            'organiser',
            'facilitator',
            'coordinator',
            'event_category',
        ]);
    }

    /**
     * Get event with relation and total participants
     */
    public function getEventParticipants()
    {
        return $this->withCountRelation([
            'organiser',
            'facilitator',
            'coordinator',
            'event_category'
        ],
        [
            'participant'
        ]);
    }

    /**
     *  Create new event
     */
    public function create($request)
    {
        DB::beginTransaction();
        try {
            $event = $this->model->create($request);
            $this->pivotRelation($event,$request);
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
    public function update($id, $request)
    {
        DB::beginTransaction();
        try {
            $event = $this->find($id); //Find the Event
            $this->arrayRequest($event, $request); //Binding the request to event model attributes
            $event->save(); //Update the event
            $this->pivotRelation($event,$request,$update = 'Yes');
            DB::commit();
            return true;
        }
        catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    /**
     * Attach and Sync pivot table relationship
     */
    private function pivotRelation($event,$request,$update = null)
    {
        $this->organiser($event,$request['organisers'],$update);
        $this->facilitator($event,$request['facilitators'],$update);
        $this->coordinator($event,$request['coordinators'],$update);
        return;
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
     * Bind Input Request with model attributes
     */
    private function arrayRequest($event, $request)
    {
        $event->name = $request['name'];
        $event->parent_id = $request['parent_id'];
        $event->event_category_id = $request['event_category_id'];
        $event->start_date = $request['start_date'];
        $event->desc = $request['desc'];
        return $event;
    }

    /**
     * Get Name and Event Duration
     */
    public function getNameAndDuration()
    {
        return $this->model->select('name','start_date','end_date')->get();
    }

}
