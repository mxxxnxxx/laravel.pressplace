@extends('layouts.parent')
@section('title', '検索ページ')
    @include('layouts.head')
    @include('layouts.header')
    @include('layouts.footer')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                {!! Form::open(['route' => 'serched', 'method' => 'get']) !!}
                @csrf
                <div class='form-group'>
                    {!! Form::label('tag', 'タグ:検索') !!}
                    {!! Form::text('tag', null, ['class' => 'form-control']) !!}
                </div>
                <div class='form-group'>
                    {!! Form::label('name', '場所の名前:検索') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                <div class='form-group'>
                    {!! Form::label('comment', 'コメント:検索') !!}
                    {!! Form::text('comment', null, ['class' => 'form-control']) !!}
                </div>
                <div class='form-group'>
                    {!! Form::submit('検索', ['class' => 'btn btn-outline-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
            <div class="col-2"></div>
        @endsection
