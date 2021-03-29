<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /**
     * Return error response
     */
    public function error($msg = 'something is wrong')
    {
        return back()->withErrors($msg);
    }

    /**
     * Return error response when there is duplicate
     */
    public function duplicateError($msg)
    {
        return back()->withErrors($msg);
    }

    /**
     * Return error response with form request
     */
    public function errorWithInput($request,$msg = 'Something is Wrong')
    {
        return back()->withErrors($msg)->withInput($request->all());
    }

    /**
     * Return success response
     */
    public function success($msg)
    {
        return back()->withSuccess($msg);
    }

    /**
     * Return success with route
     */
    public function successRoute($route,$msg = 'Update Success')
    {
        return redirect()->route($route)->withSuccess($msg);
    }



}
