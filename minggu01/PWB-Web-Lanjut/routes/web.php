<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


    Route::get('/index', [HomeController::class, 'index']);
    Route::get('/about', [AboutController::class, 'about']);
    Route::get('/articles/{id}',[ArticlesController::class, 'articles']);

    Route::resource('photos', PhotoController::class)->only([
        'index', 'show'
    ]);
    
    Route::resource('photos', PhotoController::class)->except([
        'create', 'store', 'update', 'destroy'
    ]);


    // Route::get('/greeting', function () {
    //     return view('blog.hello', ['name' => 'Alvin']);
    // });

    Route::get('/greeting', [WelcomeController::class, 'greeting']);