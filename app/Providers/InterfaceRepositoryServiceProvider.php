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
