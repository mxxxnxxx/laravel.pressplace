@extends('layouts.parent')
@include('layouts.head')
@include('layouts.header')
@include('layouts.footer')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="mt-2">
                    <h2 class="text-center text-warning">検索結果</h2>
                    @include('layouts.place_list')
                    @include('layouts.swiper')
                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
@endsection
