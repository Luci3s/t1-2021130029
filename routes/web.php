<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('landing');
});

Route::view('/', 'landing');

Route::get('/about', function () {
    return view('about');
});

Route::get('/about', function () {
    $title = 'About Us';
    $description = 'Blogging is website for sharing your thoughts and ideas with the world.';
    $button = '<a class="btn btn-lg btn-secondary" href="/">Back to Landing Page</a>';
    return view('about', compact('title', 'description', 'button'));
});

use App\Http\Controllers\AboutController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BookController;

Route::get('/about', [AboutController::class, 'index']);



Route::get('/', LandingController::class);



Route::get('/contact-us', [ContactController::class, 'index']);
Route::post('/contact-us', [ContactController::class, 'store']);

Route::get('/book', [BookControllerController::class, 'index']);
Route::post('/book', [BookControllerController::class, 'store']);

Route::resource('book', BookController::class);
