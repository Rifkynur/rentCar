<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index'])->name('home')->middleware('auth');

Route::get('/register',[AuthController::class,'showRegisterForm'])->name('register');
Route::post('/register',[AuthController::class,'register'])->name('register.store');
Route::get('/login',[AuthController::class,'showLoginForm'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('login.submit');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');

Route::get('/users',function(){
    return view('users.index');
})->name('users')->middleware('auth');

Route::get('/cars',function(){
    return view('cars.index');
})->name('cars')->middleware('auth');

Route::get('/transactions',function(){
    return view('transactions.index');
})->name('transactions')->middleware('auth');