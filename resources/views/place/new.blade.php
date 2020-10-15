@extends('layouts.parent')
@include('layouts.head')
@include('layouts.header')
@include('layouts.footer')
@section('content')
  <h1>みんなに場所をpressしてみよう！！</h1>
  {!! Form::open(['route' => 'place.store', 'method' => 'post','files' => true]) !!}
    {{Form::token()}}
    {{--  場所の名前  --}}
     <div class="form-group">
      {!! Form::label('text', '場所の名前', ['class' => 'control-label']) !!}
      {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
    </div>
    {{--  画像投稿  --}}
    <div class="form-group">
      {!! Form::label('file', '画像投稿', ['class' => 'control-label']) !!}
      {!! Form::file('place_image',['multiple' => true]) !!}
    </div>
    {{--  コメント  --}}
    <div class="form-group m-0">
      {!! Form::label('textarea', 'コメント', ['class' => 'control-label']) !!}
      {!! Form::textarea('comment', old('comment'), ['class' => 'form-control']) !!}
    </div>
    {{--  住所  --}}
    <div class="form-group m-0">
      {!! Form::label('text', '住所', ['class' => 'control-label']) !!}
      {!! Form::text('address', old('address'), ['class' => 'form-control']) !!}
    </div>

    {{--  tag  --}}
    {{--  <div class="form-group m-0">
      {!! Form::label('textarea', 'tag', ['class' => 'control-label']) !!}
      {!! Form::textarea('tag',null,['class' => 'form-control']) !!}
    </div>  --}}

    {{--  投稿ボタン  --}}
    <div class="form-group text-center">
      {!! Form::submit('投稿', ['class' => 'btn btn-primary my-2']) !!}
    </div>
  {!! Form::close() !!}
@endsection