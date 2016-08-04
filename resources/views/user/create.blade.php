@extends('layouts.app');

@section('pagetitle')
    User add
@stop

@section('content')
    {!! HTML::ul($errors->all()) !!}
    {!! FORM::open(array('url' => 'user/')) !!}
    <div class="form-group">
        {!! FORM::label('first_name','First Name') !!}
        {!! FORM::text('first_name',\Illuminate\Support\Facades\Input::old('firs_name'),array('class'=>'form-control')) !!}
    </div>
    <div class="form-group">
        {!! FORM::label('last_name','Last Name') !!}
        {!! FORM::text('last_name',\Illuminate\Support\Facades\Input::old('last_name'),array('class'=>'form-control')) !!}
    </div>
    <div class="form-group">
        {!! FORM::label('email','Email') !!}
        {!! FORM::text('email',\Illuminate\Support\Facades\Input::old('email'),array('class'=>'form-control')) !!}
    </div>

        {!! FORM::submit('Add',array('class'=>'btn btn-primary')) !!}

    {!! FORM::close() !!}
@stop
