@extends('layouts.app');

@section('pagetitle')
    Book add
@stop

@section('content')
    {!! HTML::ul($errors->all()) !!}
    {!! FORM::open(array('url' => 'book/')) !!}
    <div class="form-group">
        {!! FORM::label('titile','Title') !!}
        {!! FORM::text('title',\Illuminate\Support\Facades\Input::old('title'),array('class'=>'form-control')) !!}
    </div>
    <div class="form-group">
        {!! FORM::label('author','Author') !!}
        {!! FORM::text('author',\Illuminate\Support\Facades\Input::old('author'),array('class'=>'form-control')) !!}
    </div>
    <div class="form-group">
        {!! FORM::label('year','Year') !!}
        {!! Form::text('year',\Illuminate\Support\Facades\Input::old('year'),array('class'=>'form-control')) !!}
    </div>
    <div class="form-group">
        {!! FORM::label('genre','Genre') !!}
        {!! FORM::text('genre',\Illuminate\Support\Facades\Input::old('genre'),array('class'=>'form-control')) !!}
    </div>


        {!! FORM::submit('Add',array('class'=>'btn btn-primary')) !!}

    {!! FORM::close() !!}
@stop
