@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/done.css') }}">
@endsection

@section('content')

<div class="done_body">
    <h2>ご予約ありがとうございます</h2>
    <a class="return_button" href="/">戻る</a>
</div> 

@endsection