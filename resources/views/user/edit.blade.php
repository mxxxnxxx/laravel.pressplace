@extends('layouts.parent')
@section('title', '編集ページ')
@include('layouts.head')
@include('layouts.header')
@include('layouts.footer')

@section('content')

<div class="ユーザー情報編集">ユーザー情報編集</div>

{{-- フォーム --}}

<form method="post" action="{{ route('user.update', ['user' => $user->id]) }}" enctype="multipart/form-data">
  @csrf
  @method('PATCH')
   <label for="name">名前</label>
      <input type="text" name="name" value="{{ $user->name }}" />
  
      

  <label for="user_image">プロフィール画像</label>
  <label for="user_image" class="btn">
    <img src="{{ asset('storage/user_image/'.$user->user_image) }}" id="img">
    <input id="user_image" type="file"  name="user_image" onchange="previewImage(this);">
  </label>

  <label for="introduction">自己紹介</label>
  <textarea name="introduction" rows="4" cols="40"　>
  {{ (old('introduction',$user->introduction) ) }}
  </textarea>

{{-- エラー --}}

@if(count($errors) > 0)
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif


    {{-- ボタン --}}
    <button type="submit" class="btn btn-primary">変更</button>

</form>

 {{-- <a href="メールアドレス変更画面へのリンク">メールアドレス変更</a> --}}
{{-- <a href="パスワード変更画面へのリンク">パスワード変更画面へのリンク</a> --}}
<a href={{ route('user.confirmationSoftdelete',['user' => $user->id]) }}>アカウントを削除する</a>
@endsection


{{-- <script>
  function previewImage(obj)
  {
    var fileReader = new FileReader();
    fileReader.onload = (function() {
      document.getElementById('img').src = fileReader.result;
    });
    fileReader.readAsDataURL(obj.files[0]);
  }
</script> --}}