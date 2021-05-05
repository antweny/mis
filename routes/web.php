<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('mail', function () {
    return new \App\Mail\Leave\LeaveApproveMail();
});


/*
 |--------------------------------------------------------
 | AUTHENTICATION ROUTES
 | Here is where you can manage different users access
 | to the system
 |--------------------------------------------------------
 */
Route::namespace('Auth')->group (function () {
    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('logout');

    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset')->name('password.update');

    //Email Verification
    Route::get('email/verify', 'VerificationController@show')->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', 'VerificationController@verify')->name('verification.verify');
    Route::post('email/resend', 'VerificationController@resend')->name('verification.resend');

    //Role Permissions
    Route::prefix('permission')->name('permissions.')->group(function () {
        Route::get('/', 'PermissionController@index')->name('index');
        Route::post('store', 'PermissionController@store')->name('store');
        Route::get('edit/{permission}', 'PermissionController@edit')->name('edit');
        Route::put('update/{permission}', 'PermissionController@update')->name('update');
        Route::delete('delete/{permission}', 'PermissionController@destroy')->name('destroy');
    });

    //User Roles
    Route::prefix('role')->name('roles.')->group(function () {
        Route::get('/', 'RoleController@index')->name('index');
        Route::post('store', 'RoleController@store')->name('store');
        Route::get('edit/{role}', 'RoleController@edit')->name('edit');
        Route::put('update/{role}', 'RoleController@update')->name('update');
        Route::delete('delete/{role}', 'RoleController@destroy')->name('destroy');
    });

    //Password Reset
    Route::prefix('password')->name('passwordReset.')->group(function () {
        Route::get('reset/form/{user}', 'PasswordResetController@showResetForm')->name('form');
        Route::put('reset/submit/{user}', 'PasswordResetController@reset')->name('submit');
    });


});

/*
 |---------------------------------
 | DASHBOARD ROUTES
 |---------------------------------
 */
Route::namespace('Dashboard')->prefix('dashboard')->name('dashboard.')->group (function () {
    Route::get('op', 'OPDashboardController@index')->name('op');
    Route::get('finance', 'FinanceDashboardController@index')->name('finance');
    Route::get('job', 'JobDashboardController@index')->name('job');
    Route::get('location', 'LocationDashboardController@index')->name('location');
    Route::get('hr', 'HRDashboardController@index')->name('hr');
    Route::get('asset', 'AssetDashboardController@index')->name('asset');
    Route::get('kc', 'KnowledgeCenterDashboardController@index')->name('kc');
    Route::get('organization', 'OrganizationDashboardController@index')->name('organization');
    Route::get('individual', 'IndividualDashboardController@index')->name('individual');
    Route::get('project', 'ProjectDashboardController@index')->name('project');
    Route::get('event', 'EventDashboardController@index')->name('event');
    Route::get('participant', 'ParticipantDashboardController@index')->name('participant');
    Route::get('store', 'StoreDashboardController@index')->name('store');
    Route::get('files/manager', 'FileManagerDashboardController@index')->name('file');
    Route::get('system/settings', 'SettingDashboardController@index')->name('settings');
    Route::get('gender/series', 'GenderSeriesDashboardController@index')->name('gender');
});

Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', 'DashboardController@index')->name('index');
    Route::get('auth', 'Auth\AuthDashboardController@index')->name('auth');
});


/*
 |---------------------------------
 | USER MANAGEMENT
 |---------------------------------
 */
Route::prefix('user')->name('users.')->group(function () {
    Route::get('/', 'UserController@index')->name('index');
    Route::post('store', 'UserController@store')->name('store');
    Route::get('edit/{user}', 'UserController@edit')->name('edit');
    Route::put('update/{user}', 'UserController@update')->name('update');
    Route::delete('delete/{user}', 'UserController@destroy')->name('destroy');
    Route::get('send/login/{user}', 'UserController@sendLogin')->name('sendLogin');
});

//Change Password
Route::namespace('User')->prefix('password')->name('changePassword.')->group(function () {
    Route::get('change', 'ChangePasswordController@showPasswordChangeForm')->name('form');
    Route::put('change/submit/{user}', 'ChangePasswordController@changePassword')->name('submit');
});


/* -------------------------------------
 * LOCATION ROUTES
 * -------------------------------------
 */
Route::prefix('location')->name('locations.')->group(function () {
    Route::get('/', 'LocationController@index')->name('index');
    Route::post('store', 'LocationController@store')->name('store');
    Route::get('edit/{location}', 'LocationController@edit')->name('edit');
    Route::put('update/{location}', 'LocationController@update')->name('update');
    Route::delete('delete/{location}', 'LocationController@destroy')->name('destroy');
});


/* -------------------------------------
 * INDIVIDUAL ROUTES
 * -------------------------------------
 */
Route::prefix('individual/')->group(function () {

    //Individual Groups
    Route::prefix('group')->name('individualGroups.')->group(function () {
        Route::get('/', 'IndividualGroupController@index')->name('index');
        Route::post('store', 'IndividualGroupController@store')->name('store');
        Route::get('edit/{individualGroup}', 'IndividualGroupController@edit')->name('edit');
        Route::put('update/{individualGroup}', 'IndividualGroupController@update')->name('update');
        Route::delete('delete/{individualGroup}', 'IndividualGroupController@destroy')->name('destroy');
    });

    //Individuals
    Route::name('individuals.')->group(function () {
        Route::get('/', 'IndividualController@index')->name('index');
        Route::get('create', 'IndividualController@create')->name('create');
        Route::post('store', 'IndividualController@store')->name('store');
        Route::get('edit/{individual}', 'IndividualController@edit')->name('edit');
        Route::put('update/{individual}', 'IndividualController@update')->name('update');
        Route::delete('delete/{individual}', 'IndividualController@destroy')->name('destroy');
        Route::post('import', 'IndividualController@import')->name('import');
        Route::get('export/{string?}', 'IndividualController@export')->name('export');
    });

    //Experiences
    Route::prefix('experience')->name('experiences.')->group(function () {
        Route::get('index', 'IndividualExperienceController@index')->name('index');
        Route::get('create', 'IndividualExperienceController@create')->name('create');
        Route::post('store', 'IndividualExperienceController@store')->name('store');
        Route::get('edit/{experience}', 'IndividualExperienceController@edit')->name('edit');
        Route::put('update/{experience}', 'IndividualExperienceController@update')->name('update');
        Route::delete('delete/{experience}', 'IndividualExperienceController@destroy')->name('destroy');
        Route::post('import', 'IndividualExperienceController@import')->name('import');
        Route::get('organization/member/{organization}', 'IndividualExperienceController@membersByOrganization')->name('organization');
    });

    //Resource Peoples
    Route::prefix('resource')->name('resourcePeople.')->group(function () {
        Route::get('/', 'ResourcePeopleController@index')->name('index');
        Route::get('create', 'ResourcePeopleController@create')->name('create');
        Route::post('store', 'ResourcePeopleController@store')->name('store');
        Route::get('edit/{resourcePeople}', 'ResourcePeopleController@edit')->name('edit');
        Route::put('update/{resourcePeople}', 'ResourcePeopleController@update')->name('update');
        Route::delete('delete/{resourcePeople}', 'ResourcePeopleController@destroy')->name('destroy');
        Route::post('import', 'ResourcePeopleController@import')->name('import');
    });
});


/* -------------------------------------
 * ORGANIZATION ROUTES
 * -------------------------------------
 */

Route::prefix('organization/')->group(function () {

    //Organizations
    Route::name('organizations.')->group(function () {
        Route::get('/', 'OrganizationController@index')->name('index');
        Route::get('create', 'OrganizationController@create')->name('create');
        Route::post('store', 'OrganizationController@store')->name('store');
        Route::get('edit/{organization}', 'OrganizationController@edit')->name('edit');
        Route::put('update/{organization}', 'OrganizationController@update')->name('update');
        Route::delete('delete/{organization}', 'OrganizationController@destroy')->name('destroy');
        Route::post('import', 'OrganizationController@import')->name('import');
        Route::get('category/{category}', 'OrganizationController@category')->name('category');
    });

    //Stakeholder
    Route::prefix('stakeholder')->name('stakeholders.')->group(function () {
        Route::get('/', 'StakeholderController@index')->name('index');
        Route::post('store', 'StakeholderController@store')->name('store');
        Route::get('edit/{stakeholder}', 'StakeholderController@edit')->name('edit');
        Route::put('update/{stakeholder}', 'StakeholderController@update')->name('update');
        Route::delete('delete/{stakeholder}', 'StakeholderController@destroy')->name('destroy');
    });

    //Organization Categories
    Route::prefix('category')->name('organizationCategories.')->group(function () {
        Route::get('/', 'OrganizationCategoryController@index')->name('index');
        Route::post('store', 'OrganizationCategoryController@store')->name('store');
        Route::get('edit/{organizationCategory}', 'OrganizationCategoryController@edit')->name('edit');
        Route::put('update/{organizationCategory}', 'OrganizationCategoryController@update')->name('update');
        Route::delete('delete/{organizationCategory}', 'OrganizationCategoryController@destroy')->name('destroy');
    });

    //Organization Groups
    Route::prefix('group')->name('organizationGroups.')->group(function () {
        Route::get('/', 'OrganizationGroupController@index')->name('index');
        Route::post('store', 'OrganizationGroupController@store')->name('store');
        Route::get('edit/{organizationGroup}', 'OrganizationGroupController@edit')->name('edit');
        Route::put('update/{organizationGroup}', 'OrganizationGroupController@update')->name('update');
        Route::delete('delete/{organizationGroup}', 'OrganizationGroupController@destroy')->name('destroy');
    });

    //Knowledge Centers
    Route::prefix('kc')->name('knowledgeCenters.')->group(function () {
        Route::get('/', 'KnowledgeCenterController@index')->name('index');
        Route::get('member', 'KnowledgeCenterController@member')->name('member');
    });

});


/* ---------------
 * EVENTS ROUTES
 * ---------------
 */
Route::prefix('event/')->group(function () {

    //Event Categories
    Route::prefix('category/')->name('eventCategories.')->group(function () {
        Route::get('/', 'EventCategoryController@index')->name('index');
        Route::post('store', 'EventCategoryController@store')->name('store');
        Route::get('edit/{eventCategory}', 'EventCategoryController@edit')->name('edit');
        Route::put('update/{eventCategory}', 'EventCategoryController@update')->name('update');
        Route::delete('delete/{eventCategory}', 'EventCategoryController@destroy')->name('destroy');
    });

    //Events
    Route::name('events.')->group(function () {
        Route::get('/', 'EventController@index')->name('index');
        Route::get('create', 'EventController@create')->name('create');
        Route::post('store', 'EventController@store')->name('store');
        Route::get('edit/{event}', 'EventController@edit')->name('edit');
        Route::put('update/{event}', 'EventController@update')->name('update');
        Route::delete('delete/{event}', 'EventController@destroy')->name('destroy');
        Route::post('import', 'EventController@import')->name('import');
    });

    //Event Participants
    Route::prefix('participant/')->group(function () {

        //Participant Roles
        Route::prefix('role/')->name('participantRoles.')->group(function () {
            Route::get('/', 'ParticipantRoleController@index')->name('index');
            Route::post('store', 'ParticipantRoleController@store')->name('store');
            Route::get('edit/{participantRole}', 'ParticipantRoleController@edit')->name('edit');
            Route::put('update/{participantRole}', 'ParticipantRoleController@update')->name('update');
            Route::delete('delete/{participantRole}', 'ParticipantRoleController@destroy')->name('destroy');
        });

        //Participants
        Route::name('participants.')->group(function () {
            Route::get('index/{event?}', 'ParticipantController@index')->name('index');
            Route::get('create/', 'ParticipantController@create')->name('create');
            Route::post('store', 'ParticipantController@store')->name('store');
            Route::get('edit/{participant}', 'ParticipantController@edit')->name('edit');
            Route::put('update/{participant}', 'ParticipantController@update')->name('update');
            Route::delete('delete/{participant}', 'ParticipantController@destroy')->name('destroy');
            Route::post('import', 'ParticipantController@import')->name('import');
            Route::get('individual/{individual}', 'ParticipantController@engagement')->name('engagement');
        });
    });

    //Gender Series
    Route::prefix('gender/series')->group(function () {

        //Gender Series
        Route::name('genderSeries.')->group(function () {
            Route::get('index', 'GenderSeriesController@index')->name('index');
            Route::get('create', 'GenderSeriesController@create')->name('create');
            Route::post('store', 'GenderSeriesController@store')->name('store');
            Route::get('edit/{genderSeries}', 'GenderSeriesController@edit')->name('edit');
            Route::put('update/{genderSeries}', 'GenderSeriesController@update')->name('update');
            Route::delete('delete/{genderSeries}', 'GenderSeriesController@destroy')->name('destroy');
        });

        //Participants
        Route::prefix('participant')->name('genderSeriesParticipants.')->group(function () {
            Route::get('index', 'GenderSeriesParticipantController@index')->name('index');
            Route::get('create', 'GenderSeriesParticipantController@create')->name('create');
            Route::post('store', 'GenderSeriesParticipantController@store')->name('store');
            Route::get('edit/{genderSeriesParticipant}', 'GenderSeriesParticipantController@edit')->name('edit');
            Route::put('update/{genderSeriesParticipant}', 'GenderSeriesParticipantController@update')->name('update');
            Route::delete('delete/{genderSeriesParticipant}', 'GenderSeriesParticipantController@destroy')->name('destroy');
        });
    });

});


/* ------------------------
 * STORE MANAGEMENT ROUTES
 * ------------------------
 */
Route::prefix('store/item')->group(function () {
    //Item Categories
    Route::prefix('category/')->name('itemCategories.')->group(function () {
        Route::get('/', 'ItemCategoryController@index')->name('index');
        Route::post('store', 'ItemCategoryController@store')->name('store');
        Route::get('edit/{itemCategory}', 'ItemCategoryController@edit')->name('edit');
        Route::put('update/{itemCategory}', 'ItemCategoryController@update')->name('update');
        Route::delete('delete/{itemCategory}', 'ItemCategoryController@destroy')->name('destroy');
    });

    //Item Units
    Route::prefix('unit/')->name('itemUnits.')->group(function () {
        Route::get('/', 'ItemUnitController@index')->name('index');
        Route::post('store', 'ItemUnitController@store')->name('store');
        Route::get('edit/{itemUnit}', 'ItemUnitController@edit')->name('edit');
        Route::put('update/{itemUnit}', 'ItemUnitController@update')->name('update');
        Route::delete('delete/{itemUnit}', 'ItemUnitController@destroy')->name('destroy');
    });

    //Items List
    Route::name('items.')->group(function () {
        Route::get('/', 'ItemController@index')->name('index');
        Route::get('create', 'ItemController@create')->name('create');
        Route::post('store', 'ItemController@store')->name('store');
        Route::get('edit/{item}', 'ItemController@edit')->name('edit');
        Route::put('update/{item}', 'ItemController@update')->name('update');
        Route::delete('delete/{item}', 'ItemController@destroy')->name('destroy');
        Route::post('import', 'ItemController@import')->name('import');
    });

    //Items In List
    Route::prefix('In/')->name('itemIn.')->group(function () {
        Route::get('/', 'ItemInController@index')->name('index');
        Route::get('create', 'ItemInController@create')->name('create');
        Route::post('store', 'ItemInController@store')->name('store');
        Route::get('edit/{itemIn}', 'ItemInController@edit')->name('edit');
        Route::put('update/{itemIn}', 'ItemInController@update')->name('update');
        Route::delete('delete/{itemIn}', 'ItemInController@destroy')->name('destroy');
    });

    //Items Out List
    Route::prefix('request/')->name('itemRequests.')->group(function () {
        Route::get('/', 'ItemRequestController@index')->name('index');
        Route::get('create', 'ItemRequestController@create')->name('create');
        Route::post('store', 'ItemRequestController@store')->name('store');
        Route::get('edit/{itemRequest}', 'ItemRequestController@edit')->name('edit');
        Route::put('update/{itemRequest}', 'ItemRequestController@update')->name('update');
        Route::delete('delete/{itemRequest}', 'ItemRequestController@destroy')->name('destroy');
    });

    //Items Out List
    Route::prefix('out/')->name('itemOut.')->group(function () {
        Route::get('/', 'ItemOutController@index')->name('index');
        Route::get('issue/form/{itemOut}', 'ItemOutController@issueForm')->name('edit');
        Route::put('update/{itemOut}', 'ItemOutController@issue')->name('issue');
        Route::get('delete/{itemOut}', 'ItemOutController@reject')->name('reject');
    });

});

/* ------------------------
 * HR MANAGEMENT ROUTES
 * ------------------------
 */
Route::prefix('hr/')->group(function () {

    //Departments
    Route::prefix('departments')->name('departments.')->group(function () {
        Route::get('/', 'DepartmentController@index')->name('index');
        Route::post('store', 'DepartmentController@store')->name('store');
        Route::get('edit/{department}', 'DepartmentController@edit')->name('edit');
        Route::put('update/{department}', 'DepartmentController@update')->name('update');
        Route::delete('delete/{department}', 'DepartmentController@destroy')->name('destroy');
    });

    //Employee Designation
    Route::prefix('designations')->name('designations.')->group(function () {
        Route::get('/', 'DesignationController@index')->name('index');
        Route::post('store', 'DesignationController@store')->name('store');
        Route::get('edit/{designation}', 'DesignationController@edit')->name('edit');
        Route::put('update/{designation}', 'DesignationController@update')->name('update');
        Route::delete('delete/{designation}', 'DesignationController@destroy')->name('destroy');
    });

    //Visitor
    Route::prefix('visitors')->name('visitors.')->group(function () {
        Route::get('/', 'VisitorController@index')->name('index');
        Route::post('store', 'VisitorController@store')->name('store');
        Route::get('create', 'VisitorController@create')->name('create');
        Route::get('edit/{visitor}', 'VisitorController@edit')->name('edit');
        Route::put('update/{visitor}', 'VisitorController@update')->name('update');
        Route::delete('delete/{visitor}', 'VisitorController@destroy')->name('destroy');
    });

    //Office Rooms Management
    Route::prefix('office')->group(function () {

        //Rooms Category
        Route::prefix('room/categories')->name('roomCategories.')->group(function () {
            Route::get('/', 'RoomCategoryController@index')->name('index');
            Route::post('store', 'RoomCategoryController@store')->name('store');
            Route::get('edit/{roomCategory}', 'RoomCategoryController@edit')->name('edit');
            Route::put('update/{roomCategory}', 'RoomCategoryController@update')->name('update');
            Route::delete('delete/{roomCategory}', 'RoomCategoryController@destroy')->name('destroy');
        });

        //Rooms
        Route::prefix('rooms')->name('rooms.')->group(function () {
            Route::get('/', 'RoomController@index')->name('index');
            Route::post('store', 'RoomController@store')->name('store');
            Route::get('edit/{room}', 'RoomController@edit')->name('edit');
            Route::put('update/{room}', 'RoomController@update')->name('update');
            Route::delete('delete/{room}', 'RoomController@destroy')->name('destroy');
        });
    });

    Route::prefix('leave/')->group(function () {
        //Leave Types
        Route::prefix('types')->name('leaveTypes.')->group(function () {
            Route::get('/', 'LeaveTypeController@index')->name('index');
            Route::post('store', 'LeaveTypeController@store')->name('store');
            Route::get('edit/{leaveType}', 'LeaveTypeController@edit')->name('edit');
            Route::put('update/{leaveType}', 'LeaveTypeController@update')->name('update');
            Route::delete('delete/{leaveType}', 'LeaveTypeController@destroy')->name('destroy');
        });

        //Holidays
        Route::prefix('holidays')->name('holidays.')->group(function () {
            Route::get('/', 'HolidayController@index')->name('index');
            Route::post('store', 'HolidayController@store')->name('store');
            Route::get('edit/{holiday}', 'HolidayController@edit')->name('edit');
            Route::put('update/{holiday}', 'HolidayController@update')->name('update');
            Route::delete('delete/{holiday}', 'HolidayController@destroy')->name('destroy');
        });

        //Leave Applications
        Route::prefix('application')->name('leaveApplications.')->group(function () {
            Route::get('/', 'LeaveApplicationController@index')->name('index');
            Route::get('create', 'LeaveApplicationController@create')->name('create');
            Route::post('store', 'LeaveApplicationController@store')->name('store');
            Route::get('edit/{leaveApplication}', 'LeaveApplicationController@edit')->name('edit');
            Route::put('update/{leaveApplication}', 'LeaveApplicationController@update')->name('update');
            Route::delete('delete/{leaveApplication}', 'LeaveApplicationController@destroy')->name('destroy');
        });

        //Leave Applications
        Route::prefix('request/approval')->name('leaveApproves.')->group(function () {
            Route::get('list', 'LeaveApproveController@index')->name('index');
            Route::get('show/{leaveApprove}', 'LeaveApproveController@show')->name('show');
            Route::get('edit/{leaveApprove}/{state}', 'LeaveApproveController@edit')->name('edit');
            Route::get('approve/{leaveApprove}/{state}', 'LeaveApproveController@approve')->name('approve');
            Route::put('update/{leaveApprove}', 'LeaveApproveController@update')->name('update');
        });
    });

    Route::prefix('employee/')->group(function () {

        //Employee timesheets
        Route::prefix('timesheets')->name('timesheets.')->group(function () {
            Route::get('index', 'TimesheetController@index')->name('index');
            Route::post('store', 'TimesheetController@store')->name('store');
            Route::get('edit/{timesheet}', 'TimesheetController@edit')->name('edit');
            Route::put('update/{timesheet}', 'TimesheetController@update')->name('update');
            Route::delete('delete/{timesheet}', 'TimesheetController@destroy')->name('destroy');
            Route::get('all', 'TimesheetController@employeeTimesheet')->name('all');
        });

        Route::name('employees.')->group(function () {
            Route::get('index', 'EmployeeController@index')->name('index');
            Route::get('create', 'EmployeeController@create')->name('create');
            Route::post('store', 'EmployeeController@store')->name('store');
            Route::get('show/{employee}', 'EmployeeController@show')->name('show');
            Route::get('edit/{employee}', 'EmployeeController@edit')->name('edit');
            Route::put('update/{employee}', 'EmployeeController@update')->name('update');
            Route::delete('delete/{employee}', 'EmployeeController@destroy')->name('destroy');
            Route::post('import', 'EmployeeController@import')->name('import');
        });

        //Employee Attendance
        Route::prefix('attendances')->name('attendances.')->group(function () {
            Route::get('index', 'AttendanceController@index')->name('index');
            Route::post('store', 'AttendanceController@store')->name('store');
            Route::get('edit/{timesheet}', 'AttendanceController@edit')->name('edit');
            Route::put('update/{timesheet}', 'AttendanceController@update')->name('update');
            Route::delete('delete/{timesheet}', 'AttendanceController@destroy')->name('destroy');
            Route::get('checkIn', 'AttendanceController@checkIn')->name('checkIn');
            Route::get('checkOut', 'AttendanceController@checkOut')->name('checkOut');
        });
    });


});


/* ------------------------
 * JOB MANAGEMENT ROUTES
 * ------------------------
 */
Route::prefix('job/')->group(function () {
    //Job Types
    Route::prefix('types/')->name('jobTypes.')->group(function () {
        Route::get('/', 'JobTypeController@index')->name('index');
        Route::post('store', 'JobTypeController@store')->name('store');
        Route::get('edit/{jobType}', 'JobTypeController@edit')->name('edit');
        Route::put('update/{jobType}', 'JobTypeController@update')->name('update');
        Route::delete('delete/{jobType}', 'JobTypeController@destroy')->name('destroy');
    });
    //Job Titles
    Route::prefix('titles/')->name('jobTitles.')->group(function () {
        Route::get('/', 'JobTitleController@index')->name('index');
        Route::post('store', 'JobTitleController@store')->name('store');
        Route::get('edit/{jobTitle}', 'JobTitleController@edit')->name('edit');
        Route::put('update/{jobTitle}', 'JobTitleController@update')->name('update');
        Route::delete('delete/{jobTitle}', 'JobTitleController@destroy')->name('destroy');
    });
});


/* ------------------------
 * ASSET MANAGEMENT ROUTES
 * ------------------------
 */
Route::prefix('asset/')->group(function () {

    //Asset types
    Route::prefix('types')->name('assetTypes.')->group(function () {
        Route::get('/', 'AssetTypeController@index')->name('index');
        Route::post('store', 'AssetTypeController@store')->name('store');
        Route::get('edit/{assetType}', 'AssetTypeController@edit')->name('edit');
        Route::put('update/{assetType}', 'AssetTypeController@update')->name('update');
        Route::delete('delete/{assetType}', 'AssetTypeController@destroy')->name('destroy');
    });

    //Brand types
    Route::prefix('brands')->name('brands.')->group(function () {
        Route::get('/', 'BrandController@index')->name('index');
        Route::post('store', 'BrandController@store')->name('store');
        Route::get('edit/{brand}', 'BrandController@edit')->name('edit');
        Route::put('update/{brand}', 'BrandController@update')->name('update');
        Route::delete('delete/{brand}', 'BrandController@destroy')->name('destroy');
    });

    //Equipments
    Route::prefix('equipments')->name('equipments.')->group(function () {
        Route::get('/', 'EquipmentController@index')->name('index');
        Route::post('store', 'EquipmentController@store')->name('store');
        Route::get('edit/{equipment}', 'EquipmentController@edit')->name('edit');
        Route::put('update/{equipment}', 'EquipmentController@update')->name('update');
        Route::delete('delete/{equipment}', 'EquipmentController@destroy')->name('destroy');
    });

    //Assets
    Route::name('assets.')->group(function () {
        Route::get('index', 'AssetController@index')->name('index');
        Route::post('store', 'AssetController@store')->name('store');
        Route::get('edit/{asset}', 'AssetController@edit')->name('edit');
        Route::put('update/{asset}', 'AssetController@update')->name('update');
        Route::delete('delete/{asset}', 'AssetController@destroy')->name('destroy');
    });
});


/* ----------------------------
 * SYSTEM CONFIGURATION ROUTES
 * ----------------------------
 */
Route::namespace('Config')->prefix('config/')->group(function () {

    Route::prefix('excel/templates')->name('excelTemplates.')->group(function () {
        Route::get('/', 'ExcelTemplateController@index')->name('index');
        Route::post('store', 'ExcelTemplateController@store')->name('store');
        Route::get('download/{string}', 'ExcelTemplateController@download')->name('download');
        Route::delete('delete/{excelTemplate}', 'ExcelTemplateController@destroy')->name('destroy');
    });
});


/* ------------------------
 * OPERATION PLAN
 * ------------------------
 */
Route::prefix('op/')->group(function () {
    //Indicator Routes
        Route::prefix('indicators')->name('indicators.')->group(function () {
            Route::get('/', 'IndicatorController@index')->name('index');
            Route::post('store', 'IndicatorController@store')->name('store');
            Route::get('edit/{indicator}', 'IndicatorController@edit')->name('edit');
            Route::put('update/{indicator}', 'IndicatorController@update')->name('update');
            Route::delete('delete/{indicator}', 'IndicatorController@destroy')->name('destroy');
        });

    //Outcomes routes
        Route::prefix('outcomes')->name('outcomes.')->group(function () {
            Route::get('/', 'OutcomeController@index')->name('index');
            Route::get('create', 'OutcomeController@create')->name('create');
            Route::post('store', 'OutcomeController@store')->name('store');
            Route::get('edit/{outcome}', 'OutcomeController@edit')->name('edit');
            Route::put('update/{outcome}', 'OutcomeController@update')->name('update');
            Route::delete('delete/{outcome}', 'OutcomeController@destroy')->name('destroy');
        });

    //Output Routes
        Route::prefix('outputs')->name('outputs.')->group(function () {
            Route::get('/', 'OutputController@index')->name('index');
            Route::get('create', 'OutputController@create')->name('create');
            Route::post('store', 'OutputController@store')->name('store');
            Route::get('edit/{output}', 'OutputController@edit')->name('edit');
            Route::put('update/{output}', 'OutputController@update')->name('update');
            Route::delete('delete/{output}', 'OutputController@destroy')->name('destroy');
        });

    //Activity Routes
        Route::prefix('activities')->name('activities.')->group(function () {
            Route::get('/', 'ActivityController@index')->name('index');
            Route::get('create', 'ActivityController@create')->name('create');
            Route::post('store', 'ActivityController@store')->name('store');
            Route::get('edit/{activity}', 'ActivityController@edit')->name('edit');
            Route::put('update/{activity}', 'ActivityController@update')->name('update');
            Route::delete('delete/{activity}', 'ActivityController@destroy')->name('destroy');
        });

    //Thematic Areas
        Route::prefix('thematic/area/')->name('thematicAreas.')->group(function () {
            Route::get('/', 'ThematicAreaController@index')->name('index');
            Route::post('store', 'ThematicAreaController@store')->name('store');
            Route::get('edit/{thematicArea}', 'ThematicAreaController@edit')->name('edit');
            Route::put('update/{thematicArea}', 'ThematicAreaController@update')->name('update');
            Route::delete('delete/{thematicArea}', 'ThematicAreaController@destroy')->name('destroy');
        });
});


/* ------------------------
 * PROJECT MANAGEMENT
 * ------------------------
 */
Route::prefix('project/')->group(function () {

    //Donors Routes
    Route::prefix('donors')->name('donors.')->group(function () {
        Route::get('/', 'DonorController@index')->name('index');
        Route::post('store', 'DonorController@store')->name('store');
        Route::get('edit/{donor}', 'DonorController@edit')->name('edit');
        Route::put('update/{donor}', 'DonorController@update')->name('update');
        Route::delete('delete/{donor}', 'DonorController@destroy')->name('destroy');
    });

    //Projects Routes
    Route::name('projects.')->group(function () {
        Route::get('index', 'ProjectController@index')->name('index');
        Route::get('create', 'ProjectController@create')->name('create');
        Route::post('store', 'ProjectController@store')->name('store');
        Route::get('edit/{project}', 'ProjectController@edit')->name('edit');
        Route::put('update/{project}', 'ProjectController@update')->name('update');
        Route::delete('delete/{project}', 'ProjectController@destroy')->name('destroy');
    });

});


/* ------------------------
 * FINANCE MANAGEMENT
 * ------------------------
 */
Route::prefix('finance/')->group(function () {

    //Banks Routes
    Route::prefix('banks')->name('banks.')->group(function () {
        Route::get('/', 'BankController@index')->name('index');
        Route::post('store', 'BankController@store')->name('store');
        Route::get('edit/{bank}', 'BankController@edit')->name('edit');
        Route::put('update/{bank}', 'BankController@update')->name('update');
        Route::delete('delete/{bank}', 'BankController@destroy')->name('destroy');
    });

    //Currencies Routes
    Route::prefix('currencies')->name('currencies.')->group(function () {
        Route::get('/', 'CurrencyController@index')->name('index');
        Route::post('store', 'CurrencyController@store')->name('store');
        Route::get('edit/{currency}', 'CurrencyController@edit')->name('edit');
        Route::put('update/{currency}', 'CurrencyController@update')->name('update');
        Route::delete('delete/{currency}', 'CurrencyController@destroy')->name('destroy');
    });

    //Bank Accounts Routes
    Route::prefix('bank/accounts')->name('bankAccounts.')->group(function () {
        Route::get('/', 'BankAccountController@index')->name('index');
        Route::post('store', 'BankAccountController@store')->name('store');
        Route::get('edit/{bankAccount}', 'BankAccountController@edit')->name('edit');
        Route::put('update/{bankAccount}', 'BankAccountController@update')->name('update');
        Route::delete('delete/{bankAccount}', 'BankAccountController@destroy')->name('destroy');
    });

    //Payee Routes
    Route::prefix('payee')->name('payees.')->group(function () {
        Route::get('/', 'PayeeController@index')->name('index');
        Route::post('store', 'PayeeController@store')->name('store');
        Route::get('edit/{payee}', 'PayeeController@edit')->name('edit');
        Route::put('update/{payee}', 'PayeeController@update')->name('update');
        Route::delete('delete/{payee}', 'PayeeController@destroy')->name('destroy');
    });

    //Voucher Routes
    Route::prefix('voucher')->name('vouchers.')->group(function () {
        Route::get('/', 'VoucherController@index')->name('index');
        Route::get('create', 'VoucherController@create')->name('create');
        Route::post('store', 'VoucherController@store')->name('store');
        Route::get('edit/{voucher}', 'VoucherController@edit')->name('edit');
        Route::put('update/{voucher}', 'VoucherController@update')->name('update');
        Route::get('show/{voucher}', 'VoucherController@show')->name('show');
        Route::delete('delete/{voucher}', 'VoucherController@destroy')->name('destroy');
    });

    //Voucher Routes
    Route::prefix('payment')->name('payments.')->group(function () {
        Route::get('/', 'PaymentController@index')->name('index');
        Route::get('create', 'PaymentController@create')->name('create');
        Route::post('store', 'PaymentController@store')->name('store');
        Route::get('edit/{payment}', 'PaymentController@edit')->name('edit');
        Route::put('update/{payment}', 'PaymentController@update')->name('update');
        Route::delete('delete/{payment}', 'PaymentController@destroy')->name('destroy');
    });

});


/* ----------------------------
 * SYSTEM CONFIGURATION ROUTES
 * ----------------------------
 */
Route::prefix('system/settings')->group(function () {

    //System Backups
    Route::prefix('backups')->name('backups.')->group(function () {
        Route::get('/','BackupController@index')->name('index');
        Route::get('create','BackupController@create')->name('create');
        Route::get('download/{string}','BackupController@download')->name('download');
        Route::delete('delete/{string}','BackupController@delete')->name('delete');
    });

    //System User Activity Logs
    Route::prefix('user/logs')->name('activityLogs.')->group(function () {
        Route::get('/', 'ActivityLogController@index')->name('index');
        Route::get('show/{activityLog}', 'ActivityLogController@show')->name('show');
    });

});





