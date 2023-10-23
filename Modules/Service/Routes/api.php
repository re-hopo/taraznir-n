<?php


use Modules\Service\Http\Controllers\ServiceController;

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

Route::get('service',
    [ServiceController::class ,'index']);

Route::get('service/{slug}',
    [ServiceController::class ,'show']);
