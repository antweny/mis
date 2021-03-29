<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     */
    protected $policies = [
        //Auth
        'App\Models\Role' => 'App\Policies\RolePolicy',
        'App\Models\Permission' => 'App\Policies\PermissionPolicy',

        //HR Management
        'App\Models\Department' => 'App\Policies\DepartmentPolicy',
        'App\Models\Designation' => 'App\Policies\DesignationPolicy',
        'App\Models\Employee' => 'App\Policies\EmployeePolicy',
        'App\Models\Visitor' => 'App\Policies\VisitorPolicy',

        //User
        'App\Models\User' => 'App\Policies\UserPolicy',

        //Organization Management
        'App\Models\OrganizationCategory' => 'App\Policies\OrganizationCategoryPolicy',
        'App\Models\OrganizationGroup' => 'App\Policies\OrganizationGroupPolicy',
        'App\Models\Organization' => 'App\Policies\OrganizationPolicy',
        'App\Models\Stakeholder' => 'App\Policies\StakeholderPolicy',

        //Individual Management
        'App\Models\IndividualGroup' => 'App\Policies\IndividualGroupPolicy',
        'App\Models\Individual' => 'App\Policies\IndividualPolicy',
        'App\Models\Experience' => 'App\Policies\ExperiencePolicy',
        'App\Models\ResourcePeople' => 'App\Policies\ResourcePeoplePolicy',

        //Leave Management
        'App\Models\LeaveType' => 'App\Policies\LeaveTypePolicy',
        'App\Models\Holiday' => 'App\Policies\HolidayPolicy',
        'App\Models\LeaveApplication' => 'App\Policies\LeaveApplicationPolicy',

        //Job Management
        'App\Models\JobTitle' => 'App\Policies\JobTitlePolicy',
        'App\Models\JobType' => 'App\Policies\JobTypePolicy',

        //Location Management
        'App\Models\Location' => 'App\Policies\LocationPolicy',

        //Operation Plan
        'App\Models\Indicator' => 'App\Policies\IndicatorPolicy',
        'App\Models\Outcome' => 'App\Policies\IndicatorPolicy',
        'App\Models\Output' => 'App\Policies\IndicatorPolicy',
        'App\Models\Activity' => 'App\Policies\ActivityPolicy',

        //Finance
        'App\Models\Bank' => 'App\Policies\BankPolicy',
        'App\Models\Payee' => 'App\Policies\PayeePolicy',
        'App\Models\BankAccount' => 'App\Policies\BankAccountPolicy',
        'App\Models\Currency' => 'App\Policies\CurrencyPolicy',
        'App\Models\Payment' => 'App\Policies\PaymentPolicy',
        'App\Models\Voucher' => 'App\Policies\VoucherPolicy',

        //Asset Management
        'App\Models\Brand' => 'App\Policies\BrandPolicy',



    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function ($user,$ability) {
            return $user->hasRole('superAdmin') ? true : null;
        });

    }
}
