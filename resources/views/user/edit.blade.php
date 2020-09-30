@extends('layouts.parent')
@section('title', '編集ページ')
@include('layouts.head')
@include('layouts.header')
@include('layouts.footer')

@section('content')

<div class="ユーザー情報編集">ユーザー情報編集</div>

{{-- フォーム --}}

{{-- <form action="{{ route('user.update', $auth->id)}}" method="post" enctype="multipart/form-data"> --}}
  {!! Form::open(['route'=>'user.store', 'enctype'=>'multipart/form-data']) !!}
    <div class='form-group'>
      {!! Form::label('name', 'name') !!}
      
      {!! Form::text('name',old('name'),['class'=>'form-control']) !!}
    </div>
 {{-- {{ csrf_field() }} --}}
  {{-- <div class="画像投稿フォーム">画像投稿ボタン</div> --}}

  {{-- <div class="nickname">nickname</div>   --}}
  {{-- <div class="自己紹介">自己紹介</div> --}}
  {{-- <a href="メールアドレス変更画面へのリンク">メールアドレス変更</a> --}}
  {{-- <a href="パスワード変更画面へのリンク">パスワード変更画面へのリンク</a> --}}
{{-- <input class="send" type="submit" value="更新"> --}}

@endsection