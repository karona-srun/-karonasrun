<?php

use App\Http\Controllers\Sievphow\BooksCategoryController;
use App\Http\Controllers\Sievphow\BooksController;
use App\Http\Controllers\Sievphow\SlideImagesController;
use App\Http\Controllers\Sievphow\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('lang/{lang}', [App\Http\Controllers\LangController::class, 'change']);

Route::get('/privacy-policy', function(){
  return view('privacy_policy');
});

Auth::routes([
    'login' => true,
    'register' => true, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
  ]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/image-slides', '\App\Http\Controllers\Web\ImageSlideController');
Route::resource('/videos', '\App\Http\Controllers\Web\ContentsController');
Route::resource('/videos-categories', '\App\Http\Controllers\Web\ContentTypesController');
