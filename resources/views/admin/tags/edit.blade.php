@extends('layouts.app')

@section('content')

@include('admin.includes.errors')

    <div class="card">
        
        <div class="card-body">
            <h5 class="cart-title">Edit tag</h5>
            <form action="{{ route('tags.update',['id' => $tag->id]) }}" method="POST">
                {{ csrf_field()}}
                <div class="form-group">
                    <label for="tag">Tag</label>
                    <input type="text" name="tag" class="form-control" value="{{$tag->tag}}">
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