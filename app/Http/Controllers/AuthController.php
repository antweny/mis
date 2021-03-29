<?php

namespace App\Http\Controllers;

class AuthController extends Controller
{

    public function __construct()
    {
       $this->middleware(['auth','active_user']);
    }

    /**
     * Get authenticated user instance
     */
    protected function userEmployeeAuth()
    {
        return auth()->user()->employee;
    }

    /**
     * Get authenticated user id
     */
    public function userEmployeeId()
    {
        return auth()->user()->employee->id;
    }

    /*----------------------
     * USER AUTHORIZATION
     *----------------------*/

    /**
     * If user can read resources
     */
    protected function canView($model)
    {
        return $this->authorize('view',$model);
    }

    /**
     * If user can create a resourse
     */
    protected function canCreate($model)
    {
        return $this->authorize('create',$model);
    }

    /**
     * If user can update resource
     */
    protected function canUpdate($model)
    {
        return $this->authorize('update',$model);
    }

    /**
     * If user can delete a resource
     */
    protected function canDelete($model)
    {
        return $this->authorize('delete',$model);
    }

    /**
     * If user can import resources
     */
    protected function canImport($model)
    {
        return $this->authorize('import',$model);
    }

    /**
     * If user can import resources
     */
    protected function canManage($model)
    {
        return $this->authorize('manage',$model);
    }



}
