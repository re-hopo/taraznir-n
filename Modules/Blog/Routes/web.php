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
use Modules\Blog\Livewire\BlogDetail;
use Modules\Blog\Livewire\BlogPage;

Route::get('blog' , BlogPage::class)
    ->name('blog');

Route::get('blog/{slug}' , BlogDetail::class)
    ->name('blog-detail');
