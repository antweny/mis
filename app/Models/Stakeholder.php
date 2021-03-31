<?php

namespace App\Models;

class Stakeholder extends BaseModel
{
    /** --------
     * Log name
     * ---------
     */
    protected static $logName = 'stakeholder';


    /** -----------------------------------------
     * The attributes that are mass assignable.
     * -----------------------------------------*/
    protected $fillable = ['organization_id', 'organization_group_id', 'start_date', 'end_date', 'desc',];


    /**
     * --------------------
     *  MODEL RELATIONSHIP
     * ---------------------
     */

    //Stakeholder Must be an organization
    public function organization()
    {
        return $this->belongsTo(Organization::class)->withDefault();
    }

    //Stakeholder belongs to a specific group
    public function organization_group()
    {
        return $this->belongsTo(OrganizationGroup::class)->withDefault();
    }

    //Stakeholder belongs to a specific group
    public function bank_account()
    {
        return $this->hasMany(BankAccount::class);
    }

    /**
     * --------------------
     *  MODEL FUNCTIONS
     * ---------------------
     */
    //Get Stakeholder By Group
    public function getByGroup($group)
    {
        return $this->where('organization_group_id',$group)->get();
    }

    /**
     * @param $group
     * @return mixed
     */
    public function getStakeholderByGroup($group)
    {
        $organizationGroup = new OrganizationGroup();
        return $this->where('organization_group_id',$organizationGroup->searchReturnId('name',$group))->with('organization')->get();
    }


}
