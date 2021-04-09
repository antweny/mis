<?php

namespace App\Repository;

use App\Models\Event;
use App\Models\Individual;
use App\Models\Participant;
use App\Repository\Interfaces\ParticipantRepositoryInterface;

class ParticipantRepository extends BaseRepository implements ParticipantRepositoryInterface
{
    /**
     * @var LocationRepository
     */
    protected $event;
    protected $individual;

    /**
     * ParticipantRepository constructor.
     */
    public function __construct(Participant $model, Event $event, Individual $individual)
    {
        parent::__construct($model);
        $this->event = $event;
        $this->individual = $individual;
    }

    /*
     * Get All Participants
     */
    public function get($event = null)
    {
        if (!is_null($event)) {
            return $this->eventParticipants($event);
        }
        return $this->relationshipWithPagination(['individual', 'organization', 'event', 'location', 'participant_role', 'individual_group']);
    }


//    /**
//     * Get Model Collection with relationship
//     */
//    public function getGroupByDate()
//    {
//        return $this->model->with([
//            'individual',
//            'organization',
//            'event',
//            'location',
//            'participant_role',
//            'individual_group'
//        ])->get()->groupBy('date');
//    }
//

    /**
     * Get all Participants of specific event
     */
    private function eventParticipants($event)
    {
        $event = $this->event->find($this->decode($event));
        return $this->model->where('event_id',$event->id)
            ->with('individual', 'organization','event', 'location','participant_role','individual_group')
            ->get();
    }

//    /**
//     * Get all Individual Participation events of specific event
//     */
//    public function individualEngagement($individual)
//    {
//        $individual = $this->individual->find($this->decodable($individual));
//
//        return $this->event->leftJoin('participants', function ($join) {
//            $join->on('events.id','=','participants.event_id');
//        })->where('participants.individual_id',$individual->id)->get();
//
//    }

}
