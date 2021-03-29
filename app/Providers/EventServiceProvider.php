<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'App\Events\User\NewUserEvent' => [
            'App\Listeners\User\NewUserListener',
        ],
        'App\Events\Leave\NewLeaveApplicationEvent' => [
            'App\Listeners\Leave\NewLeaveApplicationListener',
        ],
        'App\Events\Leave\LeaveApproveEvent' => [
            'App\Listeners\Leave\LeaveApproveListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
