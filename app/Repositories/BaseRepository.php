<?php

namespace App\Repositories;

use App\Interfaces\BaseInterface;
use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class BaseRepository implements BaseInterface
{
    /**
     * Model Var
     */
    protected $model;

    /**
     * Base Repository constructor.
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get all model resource
     */
    public function get()
    {
        return $this->model->get();
    }

    /**
     * Find the specified resource.
     */
    public function find($id)
    {
        return $this->model->find($this->decodable($id));
    }

    /**
     * Find the specified resource.
     */
    public function findWith($id,array  $attributes)
    {
        return $this->model->with($attributes)->where('id',$id)->first();
    }

    /**
     * Find specified record or throw exception if fail
     */
    public function findOrFail($id)
    {
        return $this->model->findOrFail($id);
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
     * Return model with relationship
     */
    public function getWithRelation(array $attributes)
    {
        return $this->model->with($attributes)->get();
    }

    /**
     * Return model relationship with other models
     */
    public function withCountRelation(array $attributes,array $count)
    {
        return $this->model->with($attributes)->withCount($count)->get();
    }


    /**
     * Get Record ID if not exist Create new Record
     */
    public function findOrCreate($data)
    {
         return $this->model->findOrCreate($data);
    }

    /**
     * Select name and ID column only
     */
    public function selectNameAndId()
    {
        return $this->model->selectNameAndId();
    }

    /**
     * Decode ID received
     */
    public function decodable($id)
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
    public function pluckNameId()
    {
        return $this->model->pluck('name','id');
    }

//    /**
//     * Increment Record column
//     */
//    public function increment($id,$column,$num = 0)
//    {
//        $record = $this->find($id);
//        if(!is_null($record)) {
//            if ($num > 0 && !is_null($num)) {
//                return $record->increment($column, $num);
//            }
//        }
//        else {
//            return null;
//        }
//    }

//    /**
//     * Decrement Record column
//     */
//    public function decrement($id,$column,$num = 0)
//    {
//        $record = $this->find($id);
//        if(!is_null($record)) {
//            if ($num > 0 && !is_null($num)) {
//                return $record->decrement($column, $num);
//            }
//        }
//        else {
//            return null;
//        }
//    }
//
//    /**
//     * Search and Get one Record
//     */
//    public function whereFirst($column, $value)
//    {
//        return $this->model->where($column,$value)->find();
//    }


}
