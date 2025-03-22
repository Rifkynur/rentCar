<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function(){
    Route::get('/',[HomeController::class,'index'])->name('home');
    Route::get('/cars',function(){return view('cars.index');})->name('cars');
    Route::get('/transactions',function(){return view('transactions.index');})->name('transactions');
    Route::get('/reports',function(){return view('reports.index');})->name('reports');
    Route::get('/users',function(){return view('users.index');})->name('users');
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
});
Route::middleware(['guest'])->group(function(){
    Route::get('/register',[AuthController::class,'showRegisterForm'])->name('register');
    Route::post('/register',[AuthController::class,'register'])->name('register.store');
    Route::post('/login',[AuthController::class,'login'])->name('login.submit');
    Route::get('/login',[AuthController::class,'showLoginForm'])->name('login');
});


