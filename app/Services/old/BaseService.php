<?php

namespace App\Services;

use App\Repositories\BaseRepository;

class BaseService
{
    protected $repo;

    public function __construct(BaseRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Get all resources from model
     */
    public function get()
    {
        return $this->repo->get();
    }

    /**
     *  Create new model resource
     */
    public function create($request)
    {
        return $this->repo->create($request);
    }

    /**
     * Show create new form
     */
    public function update($id,$request)
    {
        return $this->repo->update($id,$request);
    }

    /**
     * Get a model instance
     */
    public function model()
    {
        return $this->repo->model();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function find($id)
    {
        return $this->repo->find($id);
    }

    /**
     * Delete the specified resource.
     */
    public function delete($id)
    {
        return $this->repo->delete($id);
    }

    /**
     * Get Specific Model ID
     */
    public function getId($val)
    {
        return $this->repo->findOrCreate($val);
    }
}
