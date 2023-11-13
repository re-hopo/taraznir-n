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


use App\Http\Livewire\Pages\AboutPage;
use App\Http\Livewire\Pages\SearchPage;
use Illuminate\Support\Facades\Route;
use Modules\Theme\Livewire\Pages\ContactPage;
use Modules\Theme\Livewire\Pages\HomePage;

Route::get('/' , HomePage::class)
    ->name('/');

Route::get('/contact' , ContactPage::class )
    ->name('contact');

Route::get('/about' , AboutPage::class )
    ->name('about');

Route::get('/search' , SearchPage::class )
    ->name('search');
