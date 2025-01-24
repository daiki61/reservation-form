<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Shop;
use App\Models\Reservation;


class RegisteredUserController extends Controller
{
    public function showRegistrationForm(){
        return view('register');
    }

    public function thanks(){
        return view('thanks');
    }

    public function mypage(){
        return view('mypage');
    }

    public function register(RegisterRequest $request){

       $validated = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        $shops = Shop::all(); 
        return view('shopall', compact('shops'));

    }

    
}