<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shop;
use App\Models\Reservation;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;




class LoginUserController extends Controller
{
    public function showLoginForm(){
        return view('login');
    }

    public function login(LoginRequest $request){
       
        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
     
           
            return redirect('/')->with('success', 'ログインに成功しました');
            }
            return back()->withErrors([
            'email' => 'メールアドレスまたはパスワードが正しくありません。',
        ])->withInput();
        
    }
}
