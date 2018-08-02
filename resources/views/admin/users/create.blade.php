@extends('layouts.app')

@section('content')

@include('admin.includes.errors')

    <div class="card">
        
        <div class="card-body">
            <h5 class="cart-title">Create new user</h5>
            <form action="{{ route('users.store') }}" method="POST">
                {{ csrf_field()}}
                <div class="form-group">
                    <label for="name">User</label>
                    <input type="text" name="name" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Create!</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop