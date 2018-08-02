@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
            <table class="table table-hover">
                    <thead>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Permissions</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        @if($users->count()>0)
                            @foreach($users as $user)
                                <tr>
                                    <td>
                                        <img src="{{asset($user->profile->avatar)}}" alt="" width="60px">
                                    </td>
                                    <td>
                                        {{$user->name}}
                                    </td>
                                    <td>
                                        @if($user->admin)
                                            <a href="{{route('users.noadmin',['id' => $user->id])}}" class="btn btn-sm btn-danger">No admin</a>
                                        @else
                                            <a href="{{route('users.admin',['id' => $user->id])}}" class="btn btn-sm btn-success">Set admin</a>
                                        @endif
                                    </td>
                                    <td>
                                        Delete
                                    </td>
                                
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <th colspan="4">No users yet</th>
                            </tr>
                        @endif
                    </tbody>
                </table>
    </div>
</div>
    
@stop