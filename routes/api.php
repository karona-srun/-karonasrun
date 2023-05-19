<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Sievphow\AuthController;
use App\Http\Controllers\ContentsController;
use App\Http\Controllers\ContentTypesController;
use App\Http\Controllers\Sievphow\BooksCategoryController;
use App\Http\Controllers\Sievphow\BooksController;
use App\Http\Controllers\Sievphow\SlideImagesController;
use App\Http\Controllers\Sievphow\UserController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/contents/search/{name}',  [ContentsController::class,'searchName']);
Route::get('/contents/new',  [ContentsController::class,'newContents']);
Route::resource('/content-types', ContentTypesController::class);
Route::resource('/contents', ContentsController::class);
Route::get('/contents/filter-content-type/{id}', [ContentsController::class,'filterContentType']);


Route::group(['prefix' => 'sievphow/auth'], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});

Route::group(['prefix' => 'sievphow/auth', 'middleware' => 'auth.api',], function ($router) {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/me', [AuthController::class, 'userProfile']);    
});

Route::group(['prefix' => 'sievphow','middleware' => 'auth.api'], function($router){
    Route::resource('book-categories', BooksCategoryController::class);
    Route::resource('books', BooksController::class);
    Route::resource('users', UserController::class);
    Route::resource('slide', SlideImagesController::class);
});