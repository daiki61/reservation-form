@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')

<div class="login_content">
    <div class="login-form_heading">
        <h2>Login</h2>
    </div>
    <form class="form" action="/login" method="post">
        @csrf
        <div class="form_group">
            <div class="form_group-content">
                <div class="form_input-text">
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" />
                </div>
                <div class="form_error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form_group">
            <div class="form_group-content">
                <div class="form_input-text">
                    <input type="password" name="password" value="{{ old('Password') }}" placeholder="Password" />
                </div>
                <div class="form_error">
                    @error('password')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
<div class="login_button">
    <button class="form_button-login" type="submit" href="/">ログイン</button>
</div>
    </form>
    
@endsection