<?php

use Illuminate\Http\Request;
use Modules\Catalog\Http\Controllers\CatalogController;

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

Route::get('catalog',
    [CatalogController::class ,'index']);

Route::get('catalog/{id}',
    [CatalogController::class ,'show']);
