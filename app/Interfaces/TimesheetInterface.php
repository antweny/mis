<?php


namespace App\Interfaces;


interface TimesheetInterface extends BaseInterface
{

    /**
     * Group all user timesheets record by date
     */
    public function groupUserTimesheetByDate($id);

    /**
     * Get all user timesheet records
     */
    public function getUserTimesheet($id);



}
