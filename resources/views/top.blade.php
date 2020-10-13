@extends('layouts.parent')
@include('layouts.head')
@include('layouts.header')
@include('layouts.footer')
@section('content')
    <h1>みんなに場所をpress!!</h1>
    <h2>みんなの場所にも行ってみよう!!</h2>
    <table class="table table-striped table-hover">
      <tr>
          <th>投稿者</th><th>写真</th><th>name</th><th>住所</th><th>コメント</th><th>tag</th><th>投稿日</th>
      </tr>
      @foreach ($places as $place)
            <tr>
                <td>{{ $place->user->name }}</td>
                <td>{{ $place->place_image }}</td>
                <td>
                  <a href={{ route('place.show', ['id' =>  $place->id]) }}>
                    {{ $place->name }}
                  </a>
                </td>
                <td>{{ $place->address }}</td>
                <td>{{ $place->comment }}</td>
                <td>{{ $place->tag->name }}</td>
                <td>{{ $place->created_at }}</td>
            </tr>
      @endforeach

    </table>
@endsection