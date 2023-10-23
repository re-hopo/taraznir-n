<?php


use Modules\User\Http\Controllers\Api\AuthController;
use Modules\User\Http\Controllers\Api\VerificationController;
use Illuminate\Support\Facades\Route;
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


Route::group(['prefix' => 'auth' ,'as' => 'auth.' ,'middleware' => 'throttle:10,60'] ,function(){

    Route::post('/sign-up-by-sms' ,[AuthController::class ,'signUpBySMS'])
        ->name('sign_up_with_sms');

    Route::post('/verify/sign-up-by-sms' ,[VerificationController::class ,'verifySignUpBySMS'])
        ->name('verify.sign_up_with_sms');



    Route::post('/sign-up-by-email' ,[AuthController::class ,'signUpByEmail'])
        ->name('sign_up_with_email');

    Route::post('/verify/sign-up-by-email' ,[VerificationController::class ,'verifySignUp'])
        ->name('verify.sign_up_with_email');



    Route::post('/sign-in-by-sms' ,[AuthController::class ,'signInBySMS'])
        ->name('sign_in_with_sms');

    Route::post('/verify/sign-in-by-sms' ,[VerificationController::class ,'verifySignInByCode'])
        ->name('verify.sign_in_with_sms');



    Route::post('/sign-in-by-email' ,[AuthController::class ,'signInByEmail'])
        ->name('sign_in_with_email');

    Route::post('/verify/sign-in-by-email' ,[VerificationController::class ,'verifySignInByCode'])
        ->name('verify.sign_in_with_email');



    Route::post('/verify/sign-in-by-mobile-and-password' ,[VerificationController::class ,'verifySignInByMobileAndPassword'])
        ->name('verify.sign_in_by_mobile_and_password');

    Route::post('/verify/sign-in-by-email-and-password' ,[VerificationController::class ,'verifySignInByEmailAndPassword'])
        ->name('verify.sign_in_by_email_and_password');



});
