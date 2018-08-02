@extends('layouts.app')

@section('content')

@include('admin.includes.errors')

    <div class="card">
        
        <div class="card-body">
            <h5 class="cart-title">Create new tag</h5>
            <form action="{{ route('tags.store') }}" method="POST">
                {{ csrf_field()}}
                <div class="form-group">
                    <label for="tag">Tag</label>
                    <input type="text" name="tag" class="form-control" placeholder="Tag">
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