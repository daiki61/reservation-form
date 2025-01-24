@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')

<div class="thanks_body">
    <h2>会員登録ありがとうございます</h2>
    <a class="login_button" href="/login">ログインする</a>
</div> 

@endsection