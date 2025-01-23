@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shopall.css') }}">
@endsection

@section('content')

<div class="grid__shoplist">
    @foreach ($shops as $shop)
    <div class="shop_item">
        <a href="{{ route('shop.detail', ['shop_id' => $shop->shop_id]) }}">
            <img src="{{ $shop->image }}" alt="{{ $shop->name }}の写真">
            <h1>{{ $shop->name }}<br>
                <span>#{{ $shop->place }}</span>
                <span>#{{ $shop->genre }}</span>
            </h1>
        </a>
    </div>
    @endforeach
</div>
 
@endsection