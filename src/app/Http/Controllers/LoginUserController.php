<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shop;
use App\Models\Reservation;
use App\Http\Requests\RegisterRequest;



class LoginUserController extends Controller
{
    public function showLoginForm(){
        return view('login');
    }

    public function login(RegisterRequest $request){
        
    }
}
