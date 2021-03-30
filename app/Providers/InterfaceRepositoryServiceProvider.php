<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class InterfaceRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repository\Interfaces\DepartmentRepositoryInterface','App\Repository\DepartmentRepository');
        $this->app->bind('App\Repository\Interfaces\DesignationRepositoryInterface','App\Repository\DesignationRepository');
        $this->app->bind('App\Repository\Interfaces\LocationRepositoryInterface','App\Repository\LocationRepository');
        $this->app->bind('App\Repository\Interfaces\JobTypeRepositoryInterface','App\Repository\JobTypeRepository');
        $this->app->bind('App\Repository\Interfaces\JobTitleRepositoryInterface','App\Repository\JobTitleRepository');
        $this->app->bind('App\Repository\Interfaces\RoleRepositoryInterface','App\Repository\RoleRepository');
        $this->app->bind('App\Repository\Interfaces\PermissionRepositoryInterface','App\Repository\PermissionRepository');
        $this->app->bind('App\Repository\Interfaces\UserRepositoryInterface','App\Repository\UserRepository');
        $this->app->bind('App\Repository\Interfaces\LeaveTypeRepositoryInterface','App\Repository\LeaveTypeRepository');
        $this->app->bind('App\Repository\Interfaces\HolidayRepositoryInterface','App\Repository\HolidayRepository');
        $this->app->bind('App\Repository\Interfaces\EmployeeRepositoryInterface','App\Repository\EmployeeRepository');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
