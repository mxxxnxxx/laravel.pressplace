@extends('layouts.parent')
@include('layouts.head')
@include('layouts.header')
@include('layouts.footer')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="text-center">
                    <h1>！！検索結果！！</h1>
                    <h2>みんなの場所にも行ってみよう!!</h2>
                    @include('layouts.place_list')
                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
@endsection
