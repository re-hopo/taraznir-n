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
use Modules\Theme\Livewire\Pages\AboutPage;
use Modules\Theme\Livewire\Pages\ContactPage;
use Modules\Theme\Livewire\Pages\HomePage;
use Modules\Theme\Livewire\Pages\SearchPage;

Route::get('/' , HomePage::class)
    ->name('/');

Route::get('/contact' , ContactPage::class )
    ->name('contact');

Route::get('/about' , AboutPage::class )
    ->name('about');
