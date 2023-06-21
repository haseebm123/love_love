<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\HomeController;
use App\Http\Controllers\API\Admin\AdminController;
use App\Http\Controllers\API\PaymentController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API Routes for your application. These
| Routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'authenticate']);
Route::post('logout', [UserController::class, 'logout']);
Route::post('forget-password-email', [UserController::class, 'ForgetPasswordEmail']);
Route::post('check-forget-password-code', [UserController::class, 'checkForgetPasswordCodeVerification']);
Route::post('update-forget-password', [UserController::class, 'updateForgetPassword']);
Route::get('invalid',[UserController::class,'invalid'])->name('invalid');
Route::post('profile',[UserController::class,'profileUpdate'])->name('profile.update');
Route::get('composer-update',[UserController::class,'composer_update'])->name('composer.update');
Route::get('discover',[UserController::class,'discover'])->name('discover');
Route::get('discover-view/{id}',[UserController::class,'discoverView'])->name('discover.view');
Route::get('get_link',[UserController::class,'get_link'])->name('get_link');


Route::controller(HomeController::class)->group(function () {
     Route::get('medical_condion','medicalCondition')->name('medicalCondition');
     Route::get('intrest','intrest')->name('intrest');
     Route::get('account_for','accountFor')->name('accountFor');
});
Route::middleware(['auth:api'])->group(function () {
    Route::controller(UserController::class)->group(function () {

            Route::get('filter','filter')->name('filter');
            Route::post('profile','updateProfile')->name('update-profile');
            Route::post('change-password','changePassword')->name('change-password');
            Route::get('discover',[UserController::class,'discover'])->name('discover');
            Route::get('discover-view/{id}',[UserController::class,'discoverView'])->name('discover.view');
            Route::post('send_otp','send_otp')->name('send_otp');
            Route::post('verify_otp','verify_otp')->name('verify_otp');
            Route::get('invite_link','invite_link')->name('invite_link');
            Route::get('check-profile','checkProfileStatus')->name('check.profile');
            Route::get('send-heart-request/{user_id}','sendHeartRequest')->name('send.heart.request');
            Route::get('send-heart/','sendHearts')->name('send.heart');
            Route::get('heart-received/','receivedHearts')->name('send.heart');
            Route::post('send-query/','SendQuery')->name('send.query');

        });
    });
    Route::get('notifications',[AdminController::class,'notification'])->name('notification');
    Route::post('notifications/read',[AdminController::class,'notificationRead'])->name('notification.read');
    Route::get('admin/profile/request',[AdminController::class,'profileReq'])->name('admin.profile.req');
    Route::post('admin/profile/accept-profile',[AdminController::class,'acceptProfile'])->name('admin.accept.profile');

    Route::get('payment',[PaymentController::class,'createPaymentIntent'])->name('admin.profile.req');

// Admin API

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
