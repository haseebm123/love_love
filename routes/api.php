<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'authenticate']);
Route::post('forget-password-email', [UserController::class, 'ForgetPasswordEmail']);
Route::post('check-forget-password-code', [UserController::class, 'checkForgetPasswordCodeVerification']);
Route::post('update-forget-password', [UserController::class, 'updateForgetPassword']);
route::get('invalid',[UserController::class,'invalid'])->name('invalid');


Route::middleware(['auth:api'])->group(function () {
        Route::controller(UserController::class)->group(function () {
            Route::post('update-profile','UpdateProfile')->name('update-profile');
            Route::post('change-password','changePassword')->name('change-password');
        });



});



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
