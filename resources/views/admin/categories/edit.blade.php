@extends('layouts.app')

@section('content')

@include('admin.includes.errors')

    <div class="card">
        
        <div class="card-body">
            <h5 class="cart-title">Edit category</h5>
            <form action="{{ route('categories.update',['id' => $category->id]) }}" method="POST">
                {{ csrf_field()}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{$category->name}}">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Update!</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop