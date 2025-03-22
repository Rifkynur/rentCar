<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('home',[
            'users' => User::count(),
            'cars' => Car::count(),
            'transactions' => Transaction::where('status','finish')->sum('total')
        ]);
    }
}
