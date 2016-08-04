@extends('layouts.app');

@section('pagetitle')
    User Edit
@stop

@section('content')
    {!! HTML::ul($errors->all()) !!}
    {!! FORM::model($user,array('route' => array('user.update',$user->id),'method' =>'PUT')) !!}
    <div class="form-group">
        {!! FORM::label('first_name','First Name') !!}
        {!! FORM::text('first_name',null,array('class'=>'form-control')) !!}
    </div>
    <div class="form-group">
        {!! FORM::label('last_name','Last Name') !!}
        {!! FORM::text('last_name',null,array('class'=>'form-control')) !!}
    </div>
    <div class="form-group">
        {!! FORM::label('email','Email') !!}
        {!! FORM::text('email',null,array('class'=>'form-control')) !!}
    </div>


    {!! FORM::submit('Update',array('class'=>'btn btn-primary')) !!}

    {!! FORM::close() !!}
@stop
