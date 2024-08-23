<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;

// Route::get('/', function () {
//     return view('posts.index');
// })->name('home');

// Route::view('/', 'posts.index')->name('home')

Route::redirect('/', 'posts');


Route::middleware('guest')->group(function () {
    //register
    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    //login
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function() {
        //dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

});


Route::resource('posts', PostController::class);



Route::get('/{user}/posts', [DashboardController::class, 'userPosts'])->name('posts.user');
