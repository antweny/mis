<?php

namespace App\Providers;

use App\Repository\Interfaces\IndividualGroupRepositoryInterface;
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
        /*
        * Dashboard Bindings
        */
        $this->app->bind('App\Repository\Interfaces\DashboardRepositoryInterface','App\Repository\DashboardRepository');



        /*
         * HR Bindings
         */
        $this->app->bind('App\Repository\Interfaces\DepartmentRepositoryInterface','App\Repository\DepartmentRepository');
        $this->app->bind('App\Repository\Interfaces\DesignationRepositoryInterface','App\Repository\DesignationRepository');
        $this->app->bind('App\Repository\Interfaces\LeaveTypeRepositoryInterface','App\Repository\LeaveTypeRepository');
        $this->app->bind('App\Repository\Interfaces\HolidayRepositoryInterface','App\Repository\HolidayRepository');
        $this->app->bind('App\Repository\Interfaces\EmployeeRepositoryInterface','App\Repository\EmployeeRepository');
        $this->app->bind('App\Repository\Interfaces\RoomCategoryRepositoryInterface','App\Repository\RoomCategoryRepository');
        $this->app->bind('App\Repository\Interfaces\RoomRepositoryInterface','App\Repository\RoomRepository');
        $this->app->bind('App\Repository\Interfaces\TimesheetRepositoryInterface','App\Repository\TimesheetRepository');
        //Leave Bindings
        $this->app->bind('App\Repository\Interfaces\LeaveApplicationRepositoryInterface','App\Repository\LeaveApplicationRepository');
        $this->app->bind('App\Repository\Interfaces\LeaveApproveRepositoryInterface','App\Repository\LeaveApproveRepository');
        $this->app->bind('App\Repository\Interfaces\VisitorRepositoryInterface','App\Repository\VisitorRepository');


        /*
        * Asset Bindings
        */
        $this->app->bind('App\Repository\Interfaces\AssetTypeRepositoryInterface','App\Repository\AssetTypeRepository');
        $this->app->bind('App\Repository\Interfaces\BrandRepositoryInterface','App\Repository\BrandRepository');
        $this->app->bind('App\Repository\Interfaces\EquipmentRepositoryInterface','App\Repository\EquipmentRepository');
        $this->app->bind('App\Repository\Interfaces\AssetRepositoryInterface','App\Repository\AssetRepository');


        /*
        * Financial Bindings
        */
        $this->app->bind('App\Repository\Interfaces\PayeeRepositoryInterface','App\Repository\PayeeRepository');
        $this->app->bind('App\Repository\Interfaces\CurrencyRepositoryInterface','App\Repository\CurrencyRepository');
        $this->app->bind('App\Repository\Interfaces\BankRepositoryInterface','App\Repository\BankRepository');
        $this->app->bind('App\Repository\Interfaces\BankAccountRepositoryInterface','App\Repository\BankAccountRepository');
        $this->app->bind('App\Repository\Interfaces\PaymentRepositoryInterface','App\Repository\PaymentRepository');
        $this->app->bind('App\Repository\Interfaces\VoucherRepositoryInterface','App\Repository\VoucherRepository');


        /*
        * Individual Bindings
        */
        $this->app->bind('App\Repository\Interfaces\IndividualGroupRepositoryInterface','App\Repository\IndividualGroupRepository');
        $this->app->bind('App\Repository\Interfaces\IndividualRepositoryInterface','App\Repository\IndividualRepository');
        $this->app->bind('App\Repository\Interfaces\IndividualExperienceRepositoryInterface','App\Repository\IndividualExperienceRepository');
        $this->app->bind('App\Repository\Interfaces\ResourcePeopleRepositoryInterface','App\Repository\ResourcePeopleRepository');


        /*
        * Event Bindings
        */
        $this->app->bind('App\Repository\Interfaces\EventCategoryRepositoryInterface','App\Repository\EventCategoryRepository');
        $this->app->bind('App\Repository\Interfaces\EventRepositoryInterface','App\Repository\EventRepository');
        $this->app->bind('App\Repository\Interfaces\ParticipantRoleRepositoryInterface','App\Repository\ParticipantRoleRepository');
        $this->app->bind('App\Repository\Interfaces\ParticipantRepositoryInterface','App\Repository\ParticipantRepository');
        $this->app->bind('App\Repository\Interfaces\GenderSeriesRepositoryInterface','App\Repository\GenderSeriesRepository');
        $this->app->bind('App\Repository\Interfaces\GenderSeriesParticipantRepositoryInterface','App\Repository\GenderSeriesParticipantRepository');


        /*
        * Store Bindings
        */
        $this->app->bind('App\Repository\Interfaces\ItemCategoryRepositoryInterface','App\Repository\ItemCategoryRepository');
        $this->app->bind('App\Repository\Interfaces\ItemUnitRepositoryInterface','App\Repository\ItemUnitRepository');
        $this->app->bind('App\Repository\Interfaces\ItemRepositoryInterface','App\Repository\ItemRepository');
        $this->app->bind('App\Repository\Interfaces\ItemInRepositoryInterface','App\Repository\ItemInRepository');
        $this->app->bind('App\Repository\Interfaces\ItemRequestRepositoryInterface','App\Repository\ItemRequestRepository');
        $this->app->bind('App\Repository\Interfaces\ItemOutRepositoryInterface', 'App\Repository\ItemOutRepository');


        /*
        * Location Bindings
        */
        $this->app->bind('App\Repository\Interfaces\LocationRepositoryInterface','App\Repository\LocationRepository');



        /*
        * Job Bindings
        */
        $this->app->bind('App\Repository\Interfaces\JobTypeRepositoryInterface','App\Repository\JobTypeRepository');
        $this->app->bind('App\Repository\Interfaces\JobTitleRepositoryInterface','App\Repository\JobTitleRepository');



        /*
        * Authorization and Authentication Bindings
        */
        $this->app->bind('App\Repository\Interfaces\RoleRepositoryInterface','App\Repository\RoleRepository');
        $this->app->bind('App\Repository\Interfaces\PermissionRepositoryInterface','App\Repository\PermissionRepository');
        $this->app->bind('App\Repository\Interfaces\UserRepositoryInterface','App\Repository\UserRepository');


        /*
        * Operational Plan Bindings
        */
        $this->app->bind('App\Repository\Interfaces\ThematicAreaRepositoryInterface','App\Repository\ThematicAreaRepository');
        $this->app->bind('App\Repository\Interfaces\IndicatorRepositoryInterface','App\Repository\IndicatorRepository');
        $this->app->bind('App\Repository\Interfaces\OutcomeRepositoryInterface','App\Repository\OutcomeRepository');
        $this->app->bind('App\Repository\Interfaces\OutputRepositoryInterface','App\Repository\OutputRepository');
        $this->app->bind('App\Repository\Interfaces\ActivityRepositoryInterface','App\Repository\ActivityRepository');


        /*
         * Organizations Bindings
         */
        $this->app->bind('App\Repository\Interfaces\OrganizationCategoryRepositoryInterface','App\Repository\OrganizationCategoryRepository');
        $this->app->bind('App\Repository\Interfaces\OrganizationGroupRepositoryInterface','App\Repository\OrganizationGroupRepository');
        $this->app->bind('App\Repository\Interfaces\OrganizationRepositoryInterface','App\Repository\OrganizationRepository');
        $this->app->bind('App\Repository\Interfaces\StakeholderRepositoryInterface','App\Repository\StakeholderRepository');


        /*
         * Project Bindings
         */
        $this->app->bind('App\Repository\Interfaces\ProjectRepositoryInterface','App\Repository\ProjectRepository');
        $this->app->bind('App\Repository\Interfaces\DonorRepositoryInterface','App\Repository\DonorRepository');


        /*
        * Settings Bindings
        */
        $this->app->bind('App\Repository\Interfaces\ActivityLogRepositoryInterface','App\Repository\ActivityLogRepository');

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
