<?php

namespace App\Repositories;

use App\Models\Event;
use App\Models\Individual;
use App\Models\IndividualGroup;
use App\Models\Location;
use App\Models\Organization;
use App\Models\Participant;

class ParticipantRepository extends BaseRepository
{
    /**
     * @var LocationRepository
     */
    protected $event;
    protected $individual;

    /**
     * ParticipantRepository constructor.
     */
    public function __construct(Participant $model)
    {
        parent::__construct($model);
        $this->event = new Event;
        $this->individual = new Individual;
    }

    /**
     * Get Model Collection with relationship
     */
    public function relationWith()
    {
        return $this->getWithRelation([
            'individual',
            'organization',
            'event',
            'location',
            'participant_role',
            'individual_group'
        ]);
    }

    /**
     * Get Model Collection with relationship
     */
    public function getGroupByDate()
    {
        return $this->model->with([
            'individual',
            'organization',
            'event',
            'location',
            'participant_role',
            'individual_group'
        ])->get()->groupBy('date');
    }

    /**
     * Update Data
     */
    public function updateData($id,$request)
    {
        return $this->update($id,$request);
    }

    /**
     * Get all Participants of specific event
     */
    public function eventParticipants($event)
    {
        $event = $this->event->find($this->decodable($event));
        return $this->model->where('event_id',$event->id)
            ->with('individual', 'organization','event', 'location','participant_role','individual_group')
            ->get();
    }

    /**
     * Get all Individual Participation events of specific event
     */
    public function individualEngagement($individual)
    {
        $individual = $this->individual->find($this->decodable($individual));

        return $this->event->leftJoin('participants', function ($join) {
            $join->on('events.id','=','participants.event_id');
        })->where('participants.individual_id',$individual->id)->get();

    }

}
