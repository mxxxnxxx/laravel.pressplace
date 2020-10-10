{{--  @extends('layouts.app')  --}}
@extends('layouts.parent')
@section('title', Auth::user()->name . 'のページ')
@include('layouts.head')
@include('layouts.header')
@include('layouts.footer')

@section('content')
    <div class="container">

      <a href={{ route('user.edit',['user' => Auth::user()->id]) }} class="profile_editing">プロフィール編集</a>
      
      <h1 class="user_name">{{ $user->name }}</h1>
    
      <div class="user_image">
            @if (!empty($user->user_image))
                <img src="{{ asset('storage/user_image/' . $user->user_image) }}" alt="プロフィール画像">
            @else
                <img src="{{ asset('storage/user_image/default.png') }}" alt="プロフィール画像">
            @endif
      </div>


      <div class="user_name">{{ Auth::user()->name }}</div>
      
      <div class="user_introduction">自己紹介
        @if (!empty($user->introduction))
          <div class="user_introduction_in">{{ Auth::user()->introduction }}</div>
        @else
          <a href={{ route('user.edit',['user' => Auth::user()->id]) }}>自己紹介を書く</a>
        @endif
      </div>

<p>ここに投稿が並ぶ予定</p>
      {{--  <div class="user_pressplace">
        @if (!empty(ログインしているユーザーに紐付いたpressplaceがあるかどうか))
        
          @foreach ($places as $place)
              <div class=""></div>

                  @yield('pressplace')

          @endforeach

        @else
        pressがありません
        @endif
      </div>  --}}
<p>ここにページネーション</p>
{{--        
      <div class="paginate">
      {{ $posts->links() }}
      </div>  --}}

    </div>

@endsection

