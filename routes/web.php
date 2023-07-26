<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;




use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\FirebaseController;

use App\Http\Controllers\FrontController;
use App\Http\Controllers\Auth\VerificationController;


/* Love Admin Routes */
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\SupportController;
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
         
        /* Firebase Controller */
        Route::controller(FirebaseController::class)->group(function () {
            Route::get('chats', 'chats')->name('get.chats');
            Route::get('get-conversation1', 'getConversation1')->name('get.conversation1');
            Route::get('send/firebase', 'sendMsg')->name('send.msg1');


        });
        /*  Love Love Admin Routes */
        Route::controller(UserManagementController::class)->group(function () {
            Route::get('users-management', 'index')->name('users.management');
            Route::get('users-block-list', 'blockList')->name('users.block');
            Route::get('users-discover-profile', 'usersDiscover')->name('users.discover.profile');
            Route::get('accounts', 'accounts')->name('accounts');
            Route::get('notification', 'notification')->name('notification');
            Route::get('terms', 'terms_condition')->name('terms');
            Route::get('privacy', 'privacy_policy')->name('privacy');
            Route::get('help', 'help_support')->name('help');
            Route::get('setting', 'setting')->name('settings');
            Route::get('support', 'support')->name('support');
            Route::get('communication_tool', 'communicationTool')->name('communication_tool');
            Route::post('disappear-msg', 'disappearMsg')->name('disappear.msg');



            Route::post('user-info-1', 'userReqInfo1')->name('user.info1');
            Route::post('user-info', 'userReqInfo')->name('user.info');
            Route::post('user-block', 'blockById')->name('user.block');
            Route::post('user-unblock', 'unBlockById')->name('user.unblock');

            Route::post('user-approve', 'approveByID')->name('user.approve');

            Route::post('search-user', 'searchUser')->name('user.search');

            Route::post('get-conversation', 'getConversation')->name('get.conversation');
            Route::post('get-conversationById', 'getConversationById')->name('get.conversationById');
            Route::post('send-message', 'sendMsg')->name('send.message');


        });
        /* End Love Love Admin Routes */
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
            Route::get('logout', 'logout')->name('logout');
            Route::get('logouts', 'logouts')->name('logouts');
            // Route::get('dashboard', 'dashboard')->name('admin.dashboard');
            Route::get('profile', 'profile')->name('admin.profile');
            Route::get('contact-us-page', 'contactUsPage')->name('contact-us-page');
            Route::post('addContactUsImage', 'addContactUsImage')->name('addContactUsImage');
            Route::get('automation', 'automation')->name('admin.automation');
            Route::get('automation', 'automation')->name('admin.automation');
            Route::post('admin-edit-profile', 'updateProfile')->name('admin.update');

        });
        Route::controller(SupportController::class)->group(function () {
            Route::get('help-support', 'index')->name('help.support');
            Route::get('term-conditions', 'index')->name('term.conditions');
            Route::get('privacy-policy', 'index')->name('privacy.policy');

            Route::post('help-support-update', 'updateContent')->name('update.help.support');
            Route::post('term-conditions-update', 'updateContent')->name('update.term.conditions');
            Route::post('privacy-policy-update', 'updateContent')->name('update.privacy.policy');

        });

});
    // });


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
