<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdministrationsController;
use App\Http\Controllers\Admin\BranchesController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\EDEmptyController;
use App\Http\Controllers\Admin\EDRejectedController;
use App\Http\Controllers\Admin\EDTrexController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\ManagementController;
use App\Http\Controllers\Admin\PositionController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
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

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function (){
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
    Route::post('update-user-status', [UserController::class, 'updateUserStatus'])->name('updateUserStatus');
    Route::get('active-users', [UserController::class, 'activeUsers'])->name('users.active');
    Route::get('inactive-users', [UserController::class, 'inactiveUsers'])->name('users.inactive');

    // ====== Pages ======
    // Positions
    Route::resource('positions', PositionController::class);
    Route::post('update-position-status', [PositionController::class, 'updatePositionStatus'])->name('updatePositionStatus');
    Route::resource('department', DepartmentController::class);
    Route::resource('administrations', AdministrationsController::class);
    Route::resource('management', ManagementController::class);
    Route::resource('branches', BranchesController::class);
    // Employees
    Route::resource('employees', EmployeeController::class);
    Route::post('update-employee-status', [EmployeeController::class, 'updateEmployeeStatus'])->name('updateEmployeeStatus');

    // Exit Door
    Route::resource('ed-trex', EDTrexController::class);
    Route::resource('ed-empty', EDEmptyController::class);
    Route::resource('ed-rejected', EDRejectedController::class);

    // Settings
    Route::resource('settings', SettingController::class);
});
