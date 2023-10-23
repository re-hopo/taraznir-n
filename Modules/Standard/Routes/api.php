<?php


use Modules\Standard\Http\Controllers\StandardController;

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

Route::get('standard',
    [StandardController::class ,'index']);

Route::get('standard/{id}',
    [StandardController::class ,'show']);
