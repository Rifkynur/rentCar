<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/register',[AuthController::class,'showRegisterForm']);
Route::post('/register',[AuthController::class,'register'])->name('register.store');