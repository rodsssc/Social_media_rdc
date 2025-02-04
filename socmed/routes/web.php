<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('intro');
});

// Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->name('dashboard')
    ->middleware('auth');

// Register Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::controller(PostController::class)->group(function () {
    Route::get('index', 'index')->name('index.index');
    Route::post('index', 'store')->name('index.store');
});

Route::controller(CommentController::class)->group(function () {
    Route::get('/comment/{id}',  'show')->name('comment.show');
    Route::get('/comment', 'index')->name('comment.index');
    Route::post('/comment', 'store')->name('comment.store');
});

Route::controller(ReactController::class)->group(function (){
    Route::post('/index','store')->name('index.store');


});
