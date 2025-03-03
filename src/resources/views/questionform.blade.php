@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/questionform.css') }}">
@endsection

@section('content')

<header class="header">
    <h1>問い合わせフォーム</h1>
    <a class="back-to-home" href="/">戻る</a>
</header>

<form class="questionform" action="/question" name="contact" method="post" >
    <div class="form-item">
        <p class="form-item-label">
            <span class="form-item-label-required">必須</span>お名前
        </p>
        <input type="text" name="name" class="form-item-input" placeholder="例）山田太郎">
   </div>

   <div class="form-item">
        <p class="form-item-label">
            <span class="form-item-label-required">必須</span>メールアドレス
        </p>
        <input type="email" name="email" class="form-item-input" placeholder="例）example@example.com">
   </div>

   <div class="form-item">
        <p class="form-item-label">
            <span class="form-item-label-required">必須</span>お問い合わせ内容
        </p>
        <textarea name="textarea" class="form-item-textarea"></textarea>
   </div>

   <input type="submit" class="form-button" value="送信する" />

</form>