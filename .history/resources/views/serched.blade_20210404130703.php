@extends('layouts.parent')
@include('layouts.head')
@include('layouts.header')
@include('layouts.footer')
@section('content')
    <div class="mt-5 text-center">
        <h1>！！検索結果！！</h1>
        <h2>みんなの場所にも行ってみよう!!</h2>
        @include('layouts.place_list')
    </div>
@endsection