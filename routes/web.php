<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Asycuda\AsycudaUserController;
use App\Http\Controllers\Admin\Asycuda\COALController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\EmployeeHelperController;
use App\Http\Controllers\Admin\Office\AgentColleagueController;
use App\Http\Controllers\Admin\Office\AgentController;
use App\Http\Controllers\Admin\Office\CompanyController;
use App\Http\Controllers\Admin\Office\HostelController;
use App\Http\Controllers\Admin\Office\LeaveController;
use App\Http\Controllers\Admin\Office\PositionController;
use App\Http\Controllers\Admin\Office\ResumeController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\Warehouse\AssuranceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Asycuda Controllers
// Office Controllers
// Admin Role Controllers

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
    // Update User Status
    Route::post('update-user-status', [UserController::class, 'updateUserStatus'])->name('updateUserStatus');
    // Reset Password
    Route::get('reset-user-password/{id}', [UserController::class, 'reset_pswd'])->name('users.reset_pswd');
    Route::get('active-users', [UserController::class, 'activeUsers'])->name('users.active');
    Route::get('inactive-users', [UserController::class, 'inactiveUsers'])->name('users.inactive');

    // ====== Employee Routes ======
    // ========== EmployeeController ==========
    Route::resource('employees', EmployeeController::class);
    // ======== EmployeeHelperController ==========
    Route::post('update-employee-status', [EmployeeHelperController::class, 'updateEmployeeStatus'])->name('updateEmployeeStatus');
    // New File
    Route::post('employee/new-file/{id}', [EmployeeHelperController::class, 'new_file'])->name('employees.new_file');
    // Delete File
    Route::post('employee/delete-file/{id}', [EmployeeHelperController::class, 'delete_file'])->name('employees.delete_file');

    // Test
    Route::get('test', function (){
        // $date = now()->format('Y-m-d');
        // $new_date = now()->addYear()->format('Y-m-d');
        // echo $date . "<br>" . $new_date;
        $date = now()->subDays(1);
        echo $date->format('Y-m-d');
    });

    // Settings
    Route::resource('settings', SettingController::class);
});
