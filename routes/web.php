<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeaderController;


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

Route::namespace('home')->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/', [HomeController::class, 'index'])->name('home');
});



Route::namespace('Auth')->group(function () {
    Route::view('/login', 'auth.login')->name('login')->middleware('guest');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.post');
    Route::post('/logout', function () {
        return redirect()->to('/')->with(Auth::logout());
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard');

    //data master
    Route::resource('/admin/header',HeaderController::class);

    //crud
    Route::post('/admin/header', [HeaderController::class, 'store'])->name('header.post');
});
