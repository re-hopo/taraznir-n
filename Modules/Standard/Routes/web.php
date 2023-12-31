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
use Modules\Standard\Livewire\StandardDetail;
use Modules\Standard\Livewire\StandardPage;

Route::get('/standard' , StandardPage::class)
    ->name('standard');

Route::get('standard/{slug}' , StandardDetail::class)
    ->name('standard-detail');
