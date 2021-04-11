{{-- @extends('layouts.app') --}}
@extends('layouts.parent')
@section('title', Auth::user()->name . 'のページ')
    @include('layouts.head')
    @include('layouts.header')
    @include('layouts.footer')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                @auth
                    @if ($user->id === $login_user_id)
                        <a href={{ route('user.edit', ['user' => Auth::user()->id]) }} class="profile_editing">プロフィール編集</a>
                    @endif
                @endauth


                <h1 class="user_name">{{ $user->name }}</h1>

                <div class="user_image">
                    @if (!empty($user->user_image))
                        <img src="{{ asset('storage/user_image/' . $user->user_image) }}" class="img-responsive"
                            alt="プロフィール画像">
                    @else
                        <img src="{{ asset('storage/user_image/default.jpg') }}" class="img-responsive" alt="プロフィール画像">
                    @endif
                </div>


                <div class="user_name">{{ Auth::user()->name }}</div>

                <div class="user_introduction">自己紹介
                    @if (!empty($user->introduction))
                        <div class="user_introduction_in">{{ Auth::user()->introduction }}</div>
                    @else
                        @auth
                            @if ($user->id === $login_user_id)
                                <a href={{ route('user.edit', ['user' => Auth::user()->id]) }}>自己紹介を書く</a>
                            @endif
                        @endauth
                    @endif
                </div>

                @include('layouts.place_list')
                @include('layouts.swiper')
            </div>
            <div class="col-2"></div>
        </div>
    </div>

@endsection
