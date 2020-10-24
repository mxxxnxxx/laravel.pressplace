@extends('layouts.parent')
@include('layouts.head')
@include('layouts.header')
@include('layouts.footer')
@section('content')
    <h1>{{ $place->name }}</h1>
    {{--  ログインしていてかつそのuserと1対多になっている情報のみ操作可能  --}}
    @auth
      @if ($place->user_id === $login_user_id)
        <a href={{ route('place.edit', ['id'=> $place->id]) }}>編集</a>
        <a href={{ route('place.confirmationSoftdelete', ['id'=> $place->id]) }}>消去</a>    
      @endif
    @endauth
    <table class="table table-striped table-hover">
      <tr>
          <th>投稿者</th>
          <th>写真</th>
          <th>住所</th>
          <th>コメント</th>
          {{--  <th>tag</th>  --}}
          <th>投稿日</th>
      </tr>
            <tr>
                <td>{{ $place->user->name }}</td>
                <td>
                @foreach ($place_images as $place_image)
                  <img src="{{ asset('storage/place_image/' . $place_image->filename) }}" alt="place画像">
                @endforeach
                </td>
                <td>{{ $place->address }}</td>
                <td>{{ $place->comment }}</td>
                {{--  <td>  --}}
                  {{--  {{ $place->tag->name }}  --}}
                {{--  </td>  --}}
                <td>{{ $place->created_at }}</td>
            </tr>
    </table>
    <div>
      <a href={{ route('place.index') }}>topへ戻る</a>
    </div>
@endsection