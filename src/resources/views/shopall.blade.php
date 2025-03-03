@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shopall.css') }}">
@endsection

@section('content')

    
<header class="header">
    <h1 class="header-ttl">Rese</h1>
    <nav class="header-nav">
        <ul class="header-nav-list">
            <li class="header-nav-item"><a href="/qform">こちらもご利用下さい</a></li>
        </ul>
    </nav>
</header>


<form action="{{ route('ser.shopall') }}" method="get">  
      @csrf
      <input type="text" name="keyword" placeholder="店舗名など">
      <input type="submit" value="検索">
     

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

</form>

<h2>検索結果</h2>
@if ($shops->isEmpty())
    <p>該当する店舗が見つかりませんでした。</p>
@else
    <ul>
        @foreach ($shops as $shop)
            <li>{{ $shop->name }}</li>
            <li>{{ $shop->place }}</li>
            <li>{{ $shop->genre }}</li>
            <li>{{ $shop->feature }}</li>
        @endforeach
    </ul>
@endif


 
@endsection