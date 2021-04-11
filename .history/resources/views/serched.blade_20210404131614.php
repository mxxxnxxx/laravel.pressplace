@extends('layouts.parent')
@include('layouts.head')
@include('layouts.header')
@include('layouts.footer')
@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="mt-5 text-center">
                    <h1>！！検索結果！！</h1>
                    <h2>みんなの場所にも行ってみよう!!</h2>
                    @include('layouts.place_list')
                </div>
            </div>
        </div>
    </div>
        @endsection
