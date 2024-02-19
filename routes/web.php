<?php

use App\Http\Controllers\Admin\AdminController;
// Asycuda Controllers
use App\Http\Controllers\Admin\Asycuda\AsycudaUserController;
use App\Http\Controllers\Admin\Asycuda\COALController;
// Office Controllers
use App\Http\Controllers\Admin\Office\AgentColleagueController;
use App\Http\Controllers\Admin\Office\AgentController;
use App\Http\Controllers\Admin\Office\CompanyController;
use App\Http\Controllers\Admin\Office\EmployeeHelperController;
use App\Http\Controllers\Admin\Office\EmployeeController;
use App\Http\Controllers\Admin\Office\HostelController;
use App\Http\Controllers\Admin\Office\PositionController;
// Admin Role Controllers
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\Warehouse\AssuranceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('admin.dashboard');
})->name('index');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    // Activities
    Route::get('activities', [AdminController::class, 'activities'])->name('activities');
    Route::post('delete-activity/{id}', [AdminController::class, 'deleteActivity'])->name('activity.destroy');
    Route::post('delete-all-activities', [AdminController::class, 'deleteAllActivities'])->name('all_activities.destroy');
    Route::post('delete-all-admin-activities', [AdminController::class, 'deleteAllAdminActivities'])->name('all_admin_activities.destroy');
    // Profile
    Route::get('profile', [AdminController::class, 'profile'])->name('profile');
    Route::get('edit-profile', [AdminController::class, 'editProfile'])->name('edit.profile');
    Route::post('update-profile', [AdminController::class, 'updateProfile'])->name('update.profile');
    // Update Password
    Route::post('/check-current-password', [AdminController::class, 'checkCurrentPwd']);
    Route::post('/update-current-password', [AdminController::class, 'updatePassword'])
        ->name('profile.update.password');

    // Logout
    Route::get('logout', [AdminController::class, 'logout'])->name('logout');

    // Authorization
    Route::resource('permissions', PermissionController::class);
    Route::resource('roles', RoleController::class);

    // Users
    Route::resource('users', UserController::class);
    Route::get('user/select-employee', [UserController::class, 'select_employee'])->name('users.select.employee');

    Route::post('update-user-status', [UserController::class, 'updateUserStatus'])->name('updateUserStatus');
    Route::get('active-users', [UserController::class, 'activeUsers'])->name('users.active');
    Route::get('inactive-users', [UserController::class, 'inactiveUsers'])->name('users.inactive');

    // =============================== Asycuda Routes ===================================
    Route::group(['prefix' => 'asycuda', 'as' => 'asycuda.'], function () {
        Route::resource('users', AsycudaUserController::class);
        Route::get('user/select-employee', [AsycudaUserController::class, 'select_employee'])->name('users.select.employee');
        Route::get('inactive-users', [AsycudaUserController::class, 'inactive'])->name('users.inactive');
        Route::resource('coal', COALController::class);
        Route::get('expired-coal', [COALController::class, 'expired'])->name('coal.expired');
        Route::get('registration-form/{id}', [COALController::class, 'reg_form'])->name('coal.reg_form');
        Route::get('refresh/{id}', [COALController::class, 'refresh'])->name('coal.refresh');
        Route::get('coal-print-form/{id}', [COALController::class, 'coal_print_form'])->name('coal.print.form');
    });

    // ====== Office Routes ======
    Route::group(['prefix' => 'office', 'as' => 'office.'], function () {
        // Positions
        Route::resource('positions', PositionController::class);
        Route::post('update-position-status', [PositionController::class, 'updatePositionStatus'])->name('updatePositionStatus');
        Route::get('appointment-positions', [PositionController::class, 'appointment'])->name('positions.appointment');
        Route::get('empty-positions', [PositionController::class, 'empty'])->name('positions.empty');
        Route::get('inactive-positions', [PositionController::class, 'inactive'])->name('positions.inactive');
        // Hostel
        Route::resource('hostel', HostelController::class);

        // ========== EmployeeController ==========
        Route::resource('employees', EmployeeController::class);
        Route::get('main-employees', [EmployeeController::class, 'main_employees'])->name('employees.main');
        Route::get('on-duty-employees', [EmployeeController::class, 'on_duty_employees'])->name('employees.on_duty');
        // Change Position Employees
        Route::get('employee/change-position-employees', [EmployeeController::class, 'change_position_employees'])->name('employees.change_position_employees');
        // Suspended Employees
        Route::get('employee/suspended-employees', [EmployeeController::class, 'suspended_employees'])->name('employees.suspended_employees');
        // Retired Employees
        Route::get('employee/retired-employees', [EmployeeController::class, 'retired_employees'])->name('employees.retired_employees');
        // Fired Employees
        Route::get('employee/fired-employees', [EmployeeController::class, 'fired_employees'])->name('employees.fired_employees');
        // Employee Custom ID Card
        Route::get('employee/custom-id-card/{id}', [EmployeeController::class, 'custom_card'])->name('employees.custom_card');

        // ======== EmployeeHelperController ==========
        Route::post('update-employee-status', [EmployeeHelperController::class, 'updateEmployeeStatus'])->name('updateEmployeeStatus');
        // Add Background
        Route::post('employee/add-background/{id}', [EmployeeHelperController::class, 'add_background'])->name('employees.add_background');
        // Add Duty Position
        Route::post('employee/duty-position/{id}', [EmployeeHelperController::class, 'duty_position'])->name('employees.duty_position');
        // Reset to Main Position
        Route::get('employee/reset-position/{id}', [EmployeeHelperController::class, 'reset_position'])->name('employees.reset_position');

        // Employee Change Position to other customs
        Route::post('employee/change-position-ocustom/{id}', [EmployeeHelperController::class, 'change_position_ocustom'])->name('employees.change_position_ocustom');
        // Employee Change Position In Return
        Route::post('employee/change-position-in-return/{id}', [EmployeeHelperController::class, 'in_return'])->name('employees.in_return');
        // Employee Discount/Update/Change Position
        Route::post('employee/duc-position/{id}', [EmployeeHelperController::class, 'duc_position'])->name('employees.duc_position');
        // Fire Employee
        Route::post('employee/fire-employee/{id}', [EmployeeHelperController::class, 'fire_employee'])->name('employees.fire_employee');
        Route::get('employee/retire-employee/{id}', [EmployeeHelperController::class, 'retire_employee'])->name('employees.retire_employee');

        // Agents & Companies
        Route::resource('agents', AgentController::class);
        // Agent Add Company Page
        Route::get('agent/add-company/{id}', [AgentController::class, 'add_company'])->name('agents.add_company');
        Route::post('agent/add-agent-company/{id}', [AgentController::class, 'add_agent_company'])->name('agents.add_agent_company');
        Route::post('agent/refresh-agent/{id}', [AgentController::class, 'refresh_agent'])->name('agents.refresh_agent');
        Route::post('agent/refresh-colleague/{id}', [AgentController::class, 'refresh_colleague'])->name('agents.refresh_colleague');
        // Agent Add Colleagues Page
        Route::get('agent/add-colleague/{id}', [AgentController::class, 'add_colleague'])->name('agents.add_colleague');
        Route::post('agent/add-agent-colleague/{id}', [AgentController::class, 'add_agent_colleague'])->name('agents.add_agent_colleague');
        // Inactive Agents
        Route::get('inactive-agents', [AgentController::class, 'inactive'])->name('agents.inactive');

        // Agent Colleagues
        Route::resource('agent-colleagues', AgentColleagueController::class);
        Route::get('inactive-agent-colleagues', [AgentColleagueController::class, 'inactive'])->name('agent-colleagues.inactive');

        // Companies
        Route::resource('companies', CompanyController::class);
        Route::get('inactive-companies', [CompanyController::class, 'inactive'])->name('companies.inactive');
    });

    // =============================== Warehouse General Management Routes ===================================
    Route::group(['prefix' => 'warehouse', 'as' => 'warehouse.'], function () {
        Route::resource('assurances', AssuranceController::class);
        Route::get('returned-assurances', [AssuranceController::class, 'returned'])->name('assurances.returned');
        Route::get('absolute-assurances', [AssuranceController::class, 'absolute'])->name('assurances.absolute');
    });

    // Test
    Route::get('test', function (){
        $date = now()->format('Y-m-d');
        $new_date = now()->addYear()->format('Y-m-d');
        echo $date . "<br>" . $new_date;
    });

    // Settings
    Route::resource('settings', SettingController::class);
});
