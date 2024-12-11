<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Finance\BudgetController;
use App\Http\Controllers\Admin\Finance\CurrencyController;
use App\Http\Controllers\Admin\Office\EmployeeController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [WebsiteController::class, 'index'])->name('index');
Route::get('/about', [WebsiteController::class, 'about'])->name('about');
Route::get('/contact', [WebsiteController::class, 'contact'])->name('website.contact');

Route::get('/optimize', function () {
    Artisan::call('optimize');
    return 'DONE!';
});

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

    // ====== Finance Routes ======
    Route::group(['prefix' => 'finance', 'as' => 'finance.'], function () {
        // ====================== Finance ===========================
        // Currency
        Route::resource('currencies', CurrencyController::class);
        // Budget
        Route::resource('budgets', BudgetController::class);
    });

    // ====== Office Routes ======
    Route::group(['prefix' => 'office', 'as' => 'office.'], function () {
        // Employees =====================================================================|
        // ========== EmployeeController ==========
        Route::resource('employees', EmployeeController::class);
        Route::post('update-employee-status', [EmployeeController::class, 'updateEmployeeStatus'])->name('updateEmployeeStatus');
    });

    // Test
    Route::get('test', function (){
        $p1 = 15;
        $p2 = 12;
        $p3 = 2;

        echo ($p1/29)*100;
    });

    // Settings
    Route::resource('settings', SettingController::class);
});
