<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;




use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\FrontController;
use App\Http\Controllers\Auth\VerificationController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

        // Route::any('/', function () {
        //     return view('welcome');
        // });

        Route::get('forgot-password',[FrontController::class,'forgotPasswords'])->name('forgot-password');
        Route::post('forgotPassword',[FrontController::class,'forgotPassword'])->name('forgotPassword');
        Route::post('updatePassword',[FrontController::class,'updatePassword'])->name('updatePassword');
        Route::get('resetpassword/{id}',[FrontController::class,'resetpassword'])->name('resetpassword');


        Auth::routes(['verify' => true]);
        route::get('/',[AdminController::class,'user_login'])->name('user-login');

        route::post('loginAdminProcess',[AdminController::class,'loginAdminProcess'])->name('loginAdminProcess');

        route::post('AdminRegisterPrcess',[AdminController::class,'AdminRegisterPrcess'])->name('AdminRegisterPrcess');

        route::get('user-register',[AdminController::class,'register'])->name('user-register');
        Route::get('CheckEmailVerify/{token}/{email}', [AdminController::class,'CheckEmailVerify'])->name('CheckEmailVerify');
        Route::get('verrify-email/{token}', [AdminController::class,'verrifyEmail'])->name('verrify-email');


    // Route::middleware([AdminMiddleware::class])->group(function(){


    Route::group(['middleware' => ['auth']], function() {

        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
        Route::get('role-change-status', [RoleController::class, 'roleChangeStatus'])->name('role-change-status');
        Route::controller(UserController::class)->group(function () {
            Route::get('view-manager', 'viewManager')->name('view-manager');
            Route::get('view-employee', 'viewEmployee')->name('view-employee');
            Route::get('employee-detail/{id}','EmployeeDetail')->name('employee-detail');
            Route::get('manager-detail/{id}','managerDetail')->name('manager-detail');

        });
        Route::controller(AdminController::class)->group(function () {
            Route::get('getUsers', 'getUsers')->name('getUsers');
            Route::post('addUpdateUser', 'addUpdateUser')->name('addUpdateUser');
            Route::post('update-profile-process', 'updateProfileProcess')->name('update-profile-process');
            Route::post('change-password','changePassword')->name('change-password');
            Route::get('delete-user', 'delete_user')->name('delete-user');
            Route::get('get-users', 'get_users')->name('get-users');
            Route::get('change-status', 'change_status')->name('change-status');
            Route::get('view-user', 'view_user')->name('view-user');
            Route::get('logouts', 'logouts')->name('logout');
            Route::get('dashboard', 'dashboard')->name('admin.dashboard');
            Route::get('profile', 'profile')->name('admin.profile');
            Route::get('contact-us-page', 'contactUsPage')->name('contact-us-page');
            Route::post('addContactUsImage', 'addContactUsImage')->name('addContactUsImage');

       });






});
    // });


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
