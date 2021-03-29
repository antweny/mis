<?php

namespace App\Repositories;

use App\Exports\IndividualExport;
use App\Models\Location;
use App\Models\Individual;
use App\Repositories\LocationRepository;

class IndividualRepository extends BaseRepository
{
    /**
     * @var LocationRepository
     */
    protected $location;
    private $excel;

    /**
     * IndividualRepository constructor.
     */
    public function __construct(Individual $model)
    {
        parent::__construct($model);
        $this->location = new Location();
    }

    /**
     * Get Model Collection with relationship
     */
    public function relationWith()
    {
        return $this->model->with(['location','individual_group'])->get()->sortBy('name');
    }

    /**
     * Get event with relation and total participants
     */
    public function engagement()
    {
        return $this->withCountRelation(['location','individual_group'],['participant']);
    }


    /**
     * Select Name, ID and Mobile for dropdown form
     */
    public function select()
    {
        return $this->model->select('id','name','mobile')->get();
    }

    /**
     * Get Model Relation resource ID
     */
    public function locationID($data)
    {
       return $this->location->findOrCreate($data);
    }

    /**
     * Export Data
     */
    public function export($format)
    {
        return $this->excel->download(new IndividualExport,'individual.'.$format);
    }


    /**
     * Add Individual to a group(s)
     */
    public function addGroup($individual, $members)
    {
        return $individual->individual_group()->attach($members);
    }

    /**
     * update Individual Group(s)
     */
    public function updateGroup($individual, $individual_groups)
    {
        return $individual->individual_group()->sync($individual_groups);
    }

    public function detachGroup($individual)
    {
        return $individual->individual_group()->detach();
    }


}
