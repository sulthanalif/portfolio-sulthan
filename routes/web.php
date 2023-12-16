<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/admin', function () {
    return view('layouts.app');
});

Route::namespace('Auth')->group(function () {
    Route::view('/login','auth.login')->name('login')->middleware('guest');
	Route::post('/login',[LoginController::class,'authenticate'])->name('login.post');
	Route::post('/logout',function(){
		return redirect()->to('/login')->with(Auth::logout());
	});
});
