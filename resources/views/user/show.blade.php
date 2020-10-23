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
    <table class="table table-striped table-hover">
      <tr>
          <th>投稿者</th>
          <th>写真</th>
          <th>name</th>
          <th>住所</th>
          <th>コメント</th>
          {{--  <th>tag</th>  --}}
          <th>投稿日</th>
      </tr>
      @foreach ($places as $place)
            <tr>
                <td>{{ $place->user->name }}</td>
                <td>
                @foreach ($place->place_images as $place_image)
                  <img src="{{ asset('storage/place_image/' . $place_image->filename) }}" alt="place画像">
                @endforeach
                </td>
                
                <td>
                  <a href={{ route('place.show', ['id' =>  $place->id]) }}>
                    {{ $place->name }}
                  </a>
                </td>
                <td>{{ $place->address }}</td>
                <td>{{ $place->comment }}</td>
                {{--  <td>  --}}
                  {{--  {{ $place->tag->name }}  --}}
                {{--  </td>  --}}
                <td>{{ $place->created_at }}</td>
            </tr>
      @endforeach
      
    </table>
    
        {{ $places->links() }}
    
    
<p>ここにページネーション</p>
{{--        
      <div class="paginate">
      {{ $posts->links() }}
      </div>  --}}

    </div>

@endsection

