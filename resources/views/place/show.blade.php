@extends('layouts.parent')
@include('layouts.head')
@include('layouts.header')
@include('layouts.footer')
@section('content')
    <h1>{{ $place->name }}</h1>
    
    <table class="table table-striped table-hover">
      <tr>
          <th>投稿者</th><th>写真</th><th>住所</th><th>コメント</th><th>tag</th><th>投稿日</th>
      </tr>
            <tr>
                <td>{{ $place->user->name }}</td>
                <td>{{ $place->place_image }}</td>
                <td>{{ $place->address }}</td>
                <td>{{ $place->comment }}</td>
                <td>
                  {{--  {{ $place->tag->name }}  --}}
                </td>
                <td>{{ $place->created_at }}</td>
            </tr>
    </table>
    <div>
      <a href={{ route('place.index') }}>topへ戻る</a>
    </div>
@endsection