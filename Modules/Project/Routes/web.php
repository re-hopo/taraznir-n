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
use Modules\Project\Livewire\ProjectDetail;
use Modules\Project\Livewire\ProjectPage;


Route::get('/project' , ProjectPage::class)
    ->name('project');


Route::get('project/{slug}' , ProjectDetail::class)
    ->name('project-detail');
