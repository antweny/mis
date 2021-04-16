<?php

namespace App\Providers;

use App\View\Composers\ActivityComposer;
use App\View\Composers\AssetTypeComposer;
use App\View\Composers\AttendanceStatusComposer;
use App\View\Composers\DonorComposer;
use App\View\Composers\PermissionComposer;
use App\View\Composers\ProjectMultipleComposer;
use App\View\Composers\RoleComposer;
use App\View\Composers\BankAccountComposer;
use App\View\Composers\BankComposer;
use App\View\Composers\BrandComposer;
use App\View\Composers\CurrencyComposer;
use App\View\Composers\EmployeeComposer;
use App\View\Composers\DepartmentComposer;
use App\View\Composers\DesignationComposer;
use App\View\Composers\EquipmentComposer;
use App\View\Composers\GenderSeriesComposer;
use \App\View\Composers\ManagerComposer;
use App\View\Composers\CoordinatorComposer;
use App\View\Composers\EventCategoryComposer;
use App\View\Composers\EventComposer;
use App\View\Composers\FacilitatorComposer;
use App\View\Composers\IndividualComposer;
use App\View\Composers\IndividualGroupComposer;
use App\View\Composers\IndividualMemberComposer;
use App\View\Composers\ItemCategoryComposer;
use App\View\Composers\ItemComposer;
use App\View\Composers\ItemRequestListComposer;
use App\View\Composers\ItemUnitComposer;
use App\View\Composers\JobTypeComposer;
use \App\View\Composers\JobTitleComposer;
use App\View\Composers\LeaveTypeComposer;
use App\View\Composers\LocationComposer;
use App\View\Composers\IndicatorComposer;
use App\View\Composers\OutcomeComposer;
use App\View\Composers\OutputComposer;
use App\View\Composers\OrganiserComposer;
use App\View\Composers\OrganizationCategoryComposer;
use App\View\Composers\OrganizationComposer;
use App\View\Composers\OrganizationGroupComposer;
use App\View\Composers\RoomCategoryComposer;
use App\View\Composers\StakeholderComposer;
use App\View\Composers\ParticipantRoleComposer;
use App\View\Composers\PayeeComposer;
use App\View\Composers\PaymentComposer;
use App\View\Composers\ThematicSectorComposer;
use App\View\Composers\UserComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        /**
         * -------------------------
         * AUTH COMPOSERS
         * -------------------------
         */
        View::composer(['components.dropdown.role'],RoleComposer::class);
        View::composer(['components.dropdown.permission'],PermissionComposer::class);


        /**
         * -------------------------
         * EVENTS COMPOSERS
         * -------------------------
         */
        View::composer(['components.dropdown.event'],EventComposer::class);
        View::composer(['components.dropdown.event-category'],EventCategoryComposer::class);
        View::composer(['components.dropdown.gender-series'],GenderSeriesComposer::class);



        /**
         * -------------------------
         * HR COMPOSERS
         * -------------------------
         */
        View::composer(['components.dropdown.department'],DepartmentComposer::class);
        View::composer(['components.dropdown.designation'],DesignationComposer::class);
        View::composer(['components.dropdown.room-category'],RoomCategoryComposer::class);
        View::composer(['components.dropdown.leave-type'],LeaveTypeComposer::class);
        // Employee Composers
        View::composer(['components.dropdown.coordinator'], CoordinatorComposer::class);
        View::composer(['components.dropdown.manager'],EmployeeComposer::class);
        View::composer(['components.dropdown.employee'],EmployeeComposer::class);
        // Employee Attendance
        View::composer(['components.attendance-status'],AttendanceStatusComposer::class);


        /**
         * -------------------------
         * INDIVIDUAL COMPOSERS
         * -------------------------
         */
        View::composer(['components.dropdown.individual'],IndividualComposer::class);
        View::composer(['components.dropdown.facilitator'],FacilitatorComposer::class);
        View::composer(['components.dropdown.individual-group'],IndividualGroupComposer::class);
        View::composer(['components.dropdown.individual-member'],IndividualMemberComposer::class);

        /**
         * -------------------------
         * ITEMS COMPOSERS
         * -------------------------
         */
        View::composer(['components.dropdown.item-category'],ItemCategoryComposer::class);
        View::composer(['components.dropdown.item-unit'],ItemUnitComposer::class);
        View::composer(['components.dropdown.item'],ItemComposer::class);
        View::composer(['components.dropdown.item-request-list'],ItemRequestListComposer::class);


        /**
         * -------------------------
         * JOB COMPOSERS
         * -------------------------
         */
        View::composer(['components.dropdown.job-type'],JobTypeComposer::class);
        View::composer(['components.dropdown.job-title'],JobTitleComposer::class);


        /**
         * -------------------------
         * LOCATION COMPOSERS
         * -------------------------
         */
        View::composer(['components.dropdown.location'],LocationComposer::class);


        /**
         * -------------------------
         * ORGANIZATION COMPOSERS
         * -------------------------
         */
        View::composer(['components.dropdown.organization-category'],OrganizationCategoryComposer::class);
        View::composer(['components.dropdown.organization'],OrganizationComposer::class);
        View::composer(['components.dropdown.organiser'],OrganiserComposer::class);
        View::composer(['components.dropdown.organization-group'],OrganizationGroupComposer::class);
        View::composer(['components.dropdown.stakeholder'],StakeholderComposer::class);
        View::composer(['components.dropdown.bank'],BankComposer::class);
        View::composer(['components.dropdown.donor'],DonorComposer::class);


        /**
         * -------------------------
         * PARTICIPANT COMPOSERS
         * -------------------------
         */
        View::composer(['components.dropdown.participant_role'],ParticipantRoleComposer::class);


        /**
         * -------------------------
         * USER COMPOSERS
         * -------------------------
         */
        View::composer(['components.dropdown.user'],UserComposer::class);


        /**
         * -------------------------
         * OPERATION PLAN COMPOSERS
         * -------------------------
         */
        View::composer(['components.dropdown.indicator'],IndicatorComposer::class);
        View::composer(['components.dropdown.outcome'],OutcomeComposer::class);
        View::composer(['components.dropdown.output'],OutputComposer::class);
        View::composer(['components.dropdown.activity'],ActivityComposer::class);
        View::composer(['components.dropdown.thematic-sector'],ThematicSectorComposer::class);


        /**
         * -------------------------
         * FINANCE COMPOSERS
         * -------------------------
         */
        View::composer(['components.dropdown.currency'],CurrencyComposer::class);
        View::composer(['components.dropdown.payee'],PayeeComposer::class);
        View::composer(['components.dropdown.bank-account'],BankAccountComposer::class);
        View::composer(['components.dropdown.payment'],PaymentComposer::class);


        /**
         * -------------------------
         * ASSET COMPOSERS
         * -------------------------
         */
        View::composer(['components.dropdown.brand'],BrandComposer::class);
        View::composer(['components.dropdown.asset-type'],AssetTypeComposer::class);
        View::composer(['components.dropdown.equipment'],EquipmentComposer::class);

        /**
         *
         */
        View::composer(['components.dropdown.project-multiple'],ProjectMultipleComposer::class);



    }

}
