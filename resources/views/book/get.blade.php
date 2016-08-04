@extends('layouts.app');

@section('pagetitle')
    Choose User
@stop

@section('content')
    <table class="table table-bordered table-stripped">
        <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->first_name}}</td>
                <td>{{$user->last_name}}</td>
                <td>{{$user->email}}</td>
                <td width="380">
                    <a class="btn btn-small btn-info" href="{{URL::to('user/'.$user->id.'/edit')}}">Edit</a>
                    <a class="btn btn-small btn-info" href="{{URL::to('book/'.$book->id.'/get/user/'.$user->id)}}">Get</a>



                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
@stop