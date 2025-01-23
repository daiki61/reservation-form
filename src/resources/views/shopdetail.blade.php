@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shopdetail.css') }}">
@endsection

@section('content')

<div class="grid__shop_item">
    <div class="shop_info">
        <h1>{{ $shop->name }}</h1>
        <img src="{{ $shop->image }}" alt="{{ $shop->name }}の写真">
        <h1>
            <span>#{{ $shop->place }}</span>
            <span>#{{ $shop->genre }}</span><br>{{ $shop->feature}}
        </h1>
    </div>


    <div class="reservation_form">
        <form action="{{ route('reservation.shop', ['shop_id' => $shop->shop_id]) }}" method="post">
            @csrf
            <h2>予約</h2>

            <input type="hidden" name="shop_id" value="{{ $shop->id }}">
            
            <label for="date"></label>
            <input type="date" name="reservationDate" id="reservationDate" value="{{ old('reservationDate') }}" required>

            <label for="time"></label>
            <input type="time" name="reservationTime" id="reservationTime" value="{{ old('reservationTime') }}" required>

            <label for="guests"></label>
            <select name="reservationNum" id="reservationNum" value="{{ old('reservationNum') }}" required>
                @for ($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}">{{ $i }}人</option>
                @endfor
            </select>
            <div class="reservation_detail">
                <p>Shop: {{ session('name', '未入力') }}</p>
                <p>Date: {{ session('date', '未入力') }}</p>
                <p>Time: {{ session('time', '未入力' )}}</p>
                <p>Number: {{ session('guests', '未入力') }}</p>
            </div>
            <button class="reservation_button-submit" type="submit">予約する</button>
        </form>
    </div>
</div>

@endsection