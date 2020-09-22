{{--  @extends('layouts.app')  --}}
@extends('layouts.parent')
@section('title', Auth::user()->name . 'のページ')
@include('layouts.head')
@include('layouts.header')
@include('layouts.footer')

@section('content')
    <div class="container">
      <a href="編集ページへのリンク" class="profile_editing">プロフィール編集</a>
      <div class="user_image"></div>

      <div class="user_name"></div>
      
      <div class="user_introduction"></div>
        {{--  @if (ユーザーの自己紹介がある時)  --}}
        {{--  else  --}}
        {{--  <a href="編集ページへのリンク">自己紹介を書く</a>  --}}
        {{--  @endif  --}}

      <div class="user_pressplace">
        {{--  @if (ユーザーのpressがある時)  --}}
        {{--  prees内容が繰り返しで並ぶ  --}}
          {{--  @foreach ($places as $place)  --}}
              {{--  <div class=""></div>  --}}
                

              {{--  以下でdbより自分の投稿のみを取得  --}}
                  {{--  @yield('pressplace')  --}}

          {{--  @endforeach  --}}

        {{--  @else  --}}
        {{--  pressがありません  --}}
        {{--  @endif  --}}
      </div>
      
      <div class="paginate">
      {{--  ↓以下はページネーション　10投稿ずつ  --}}
      {{--  {{ $posts->links() }}  --}}
      </div>

    </div>
@endsection

