@extends('layouts.app');

@section('pagetitle')
    Book edit
@stop

@section('content')
    {!! HTML::ul($errors->all()) !!}
    {!! FORM::model($book,array('route' => array('book.update',$book->id),'method' =>'PUT')) !!}
    <div class="form-group">
        {!! FORM::label('titile','Title') !!}
        {!! FORM::text('title',null,array('class'=>'form-control')) !!}
    </div>
    <div class="form-group">
        {!! FORM::label('author','Author') !!}
        {!! FORM::text('author',null,array('class'=>'form-control')) !!}
    </div>
    <div class="form-group">
        {!! FORM::label('year','Year') !!}
        {!! Form::text('year',null,array('class'=>'form-control')) !!}
    </div>
    <div class="form-group">
        {!! FORM::label('genre','Genre') !!}
        {!! FORM::text('genre',null,array('class'=>'form-control')) !!}
    </div>


    {!! FORM::submit('Update',array('class'=>'btn btn-primary')) !!}

    {!! FORM::close() !!}
@stop
