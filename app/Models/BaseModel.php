<?php

namespace App\Models;

use App\Traits\Hashidable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Vinkla\Hashids\Facades\Hashids;

class BaseModel extends Model
{
    use Hashidable;
    use LogsActivity;

    /**
     * Log all activities performed on the model
     */
    protected static $logFillable = true;

    protected static $logOnlyDirty = true;

    /* ------------------------------------------
    * Log all activities performed on the model
    * ------------------------------------------*/


    /**
     * --------------------
     *  MODEL MUTATOR
     * ---------------------
     */
    protected function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords(strtolower($value));
    }
    protected function setAcronymAttribute($value)
    {
        $this->attributes['acronym'] = strtoupper($value);
    }


    /**
     * --------------------
     *  MODEL ACCESSOR
     * ---------------------
     */
    public function getPlaceAttribute()
    {
        return $this->location_id;
    }
    public function getCompanyAttribute()
    {
        return $this->organization_id;
    }
    public function getOrgCategoryAttribute()
    {
        return $this->organization_category_id;
    }
    public function getSdAttribute()
    {
        return $this->start_date;
    }
    public function getEdAttribute()
    {
        return $this->end_date;
    }

    //Convert Date into human readable
    public function getStartAttribute()
    {
        return date('d M, Y',strtotime($this->start_date));
    }
    public function getEndAttribute()
    {
        return date('d M, Y',strtotime($this->end_date));
    }
    public function getTareheAttribute()
    {
        return date('d M, Y',strtotime($this->date));
    }
    public function getCreatedAttribute()
    {
        return date('d F, Y',strtotime($this->created_at));
    }

    /**
     * Decode the primary id
     */
    public function encode($id)
    {
        return Hashids::encode($this->getKey(),20,15,1,3);
    }

    /**
     * --------------------
     *  MODEL FUNCTIONS
     * ---------------------
     */


    /**
     * Get Specified resource ID by name
     * if not exist Create new resource
     */
    public function findOrCreate($data)
    {
        $object = $this->where('name',$data)->orWhere('id',$data)->first();

        if(isset($object) && !is_null($object)){
           return $object->id;
        }
        else {
            if (is_null($object) && !is_null($data)) {
                $object = $this->create(['name'=>$data]);
                return $object->id;
            }
        }
    }


    /**
     * Select name and id of resources
     */
    public function selectNameID()
    {
        return $this->select('name','id')->get()->sortBy('name');
    }

    /**
     * Select name and id of resources
     */
    public function selectNameIDAcronym()
    {
        return $this->select('id','name','acronym')->get();
    }


    /**
     * Pluck name and id for
     */
    public function pluckNameID()
    {
        return $this->pluck('name','id');
    }


    /**
     * Sort Order Asc
     */
    public function orderBySortAsc()
    {
        return $this->orderBy('sort','asc')->get();
    }


    /**
     * Sort Order Desc
     */
    public function orderBySortDesc()
    {
        return $this->orderBy('sort','desc')->get();
    }


    /**
     * Dynamic Search of records into a database and return Collection
     */
    public function searchReturnCollection($column = 'name', $val)
    {
        return $this->where($column,$val)->first();
    }


    /**
     * Dynamic Search of records into a database and return Collection
     */
    public function searchReturnId($column = 'name', $name)
    {
        $result =  $this->where($column,$name)->first();

        return isset($result) ? $result->id : null;
    }


}
