@extends('main')

@section('content')

    {!! Form::model($tag, ['route' => ['tags.update',$tag->id] , 'method' => 'PUT']) !!}

    {{Form::label('name','Name:')}}
    {{Form::text('name' ,null, ['class' => 'form-control'])}}

    {{Form::submit('Submit changes' , ['class' => 'btn btn-success', 'style' => 'margin-top:20px'])}}

    {!! Form::close() !!}

@endsection