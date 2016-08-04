@extends('layouts.app');

@section('pagetitle')
    User List
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

                        @can('edit',\App\User::find($user->id),\App\User::class)
                        <a class="btn btn-small btn-info" href="{{URL::to('user/'.$user->id.'/edit')}}">Edit</a>
                        @endcan

                            <a class="btn btn-small btn-info" href="{{URL::to('user/'.$user->id)}}">Show books</a>
                            @can('isAdmin',\App\User::class)
                                {!! FORM::open(array('url' => 'user/'.$user->id,'class'=>'pull-right')) !!}
                        {!! FORM::hidden('_method','DELETE') !!}
                        {!! FORM::submit('Delete',array('class'=>'btn btn-warning')) !!}
                        {!! FORM::close() !!}
                                @endcan

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
@stop