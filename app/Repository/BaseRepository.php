<?php

namespace App\Repository;

use App\Repository\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class BaseRepository implements BaseRepositoryInterface
{
    /*
     * Model Variable
     */
    protected $model;

    /*
     * Inject Dynamic Model into a repository
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }


    /**
     * Fetch all model collection
     */
    public function get()
    {
        return $this->model->get();
    }


    /**
     * Find the specified resource by ID.
     */
    public function find($id)
    {
        return $this->model->find($this->decode($id));
    }


    /**
     * Find specified record or throw exception if fail
     */
    public function findOrFail($id)
    {
        return $this->model->findOrFail($this->decode($id));
    }


    /**
     * Create new Record
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }


    /**
     * Update existing record
     */
    public function update($id, array $attributes)
    {
        $object = $this->find($id);
        $object->fill($attributes);
        $object->save();
        return $object;
    }


    /**
     * Delete Record
     */
    public function delete($id)
    {
        return $this->find($id)->delete();
    }


    /**
     * Return Model instance
     */
    public function model()
    {
        return $this->model;
    }


    /**
     * Find id the search data exists if not exist Create new Record
     */
    public function findOrCreate($data)
    {
        return $this->model->findOrCreate($data);
    }


    /**
     * Return model with relationship
     */
    public function relationshipWith(array $attributes)
    {
        return $this->model->with($attributes)->get();
    }

    /**
     * Return Relationship With Pagination
     */
    public function relationshipWithPagination(array $attributes, $int = 25)
    {
        return $this->model->with($attributes)->paginate($int);
    }


    /**
     * Return relationship collection and count
     */
    public function relationWithCount(array $attributes, array $count)
    {
        return $this->model->with($attributes)->withCount($count)->get();
    }

    /**
     * Select name and ID column only
     */
    public function selectNameID()
    {
        return $this->model->selectNameID();
    }


    public function decode($id)
    {
        try {
            return Hashids::decode($id)[0];
        }
        catch (\Exception $e) {
            return $id;
        }
    }


    /**
     * Pluck model name and id
     */
    public function pluckNameID()
    {
        return $this->model->pluckNameID();
    }

    /*
     * Pagination
     */
    public function paginate($int = 25)
    {
        return $this->model->paginate($int);
    }


}
