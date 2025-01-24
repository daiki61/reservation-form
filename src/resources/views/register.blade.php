@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="register__content">
    <div class="register-form_heading">
        <h2>Registration</h2>
    </div>
    <form class="form" action="/register" method="post">
      @csrf
      <div class="form__group">
            <div class="form__group-content">
                <div class="form__input--text">
                   <input type="text" name="username" placeholder="Username" value="{{ old('username') }}"  />
                </div>
                <div class="form__error">
                 @error('username')
                 {{ $message }}
                 @enderror
                </div>
            </div>
      </div>

    <div class="form__group">
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" />
                </div>
                <div class="form__error">
                @error('email')
                {{ $message }}
                @enderror
                </div>
            </div>
    </div>

    <div class="form__group">
            <div class="form__group-content">
                <div class="form__input--text">
                     <input type="password" name="password" placeholder="Password" value="{{ old('password') }}" />
                </div>
                <div class="form__error">
                @error('password')
                {{ $message }}
                @enderror
                </div>
            </div>
    </div>
    
    <div class="register__button">
        <button class="form__button-register" type="submit" href="/">登録</button>
    </div>
    </form>
  
</div>
@endsection