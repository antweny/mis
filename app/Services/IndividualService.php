<?php

namespace App\Services;

use App\Imports\IndividualImport;
use App\Repositories\IndividualRepository;

class IndividualService extends BaseService
{
    public function __construct(IndividualRepository$repo)
    {
        parent::__construct($repo);
    }

    /**
     * Get collection with relationship model
     */
    public function withRelation()
    {
        return $this->repo->relationWith();
    }

    /**
     * Get collection with relationship model
     */
    public function engagement()
    {
        return $this->repo->engagement();
    }

    /**
     * Create new resource
     */
    public function create($request)
    {
        $request['location_id'] = $this->repo->locationId($request['place']);

        $individual = $this->repo->create($request);

        return $this->repo->addGroup($individual,$request['individual_groups']);
    }

    /**
     * Update specified resource
     */
    public function update($id,$request)
    {
        $request['location_id'] = $this->repo->locationId($request['place']);

        $individual = $this->repo->update($id,$request);

        if(isset($request['individual_groups'])) {
            return $this->repo->updateGroup($individual,$request['individual_groups']);
        }
        return $this->repo->detachGroup($individual);
    }

    /**
     * Import Organization List
     */
    public function import($request)
    {
        $file = $request->file('imported_file')->store('import/individual'); //Store Imported file to storage
        $import = new IndividualImport; //Instance of Individual Import
        $import->import($file);

        if($import->failures()->isNotEmpty()) {
            return $import->failures();
        }
        if($import->errors()->isNotEmpty()) {
            return $import->errors();
        }
        return $import;
    }


}
