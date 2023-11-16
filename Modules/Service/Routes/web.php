<?php

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

use Illuminate\Support\Facades\Route;
use Modules\Service\Livewire\ServiceDetail;
use Modules\Service\Livewire\ServicePage;


Route::get('service' ,ServicePage::class )
    ->name('service');

Route::get('service/{slug}' ,ServiceDetail::class )
    ->name('service-detail');
