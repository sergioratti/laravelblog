@extends('layouts.app')

@section('content')

    @include('admin.includes.errors')

    <div class="card">
        
        <div class="card-body">
            <h5 class="cart-title">Edit post</h5>
            <form action="{{ route('posts.update',['id'=>$post->id]) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field()}}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="{{$post->title}}">
                </div>
                <div class="form-group">
                    <label for="featured">Featured image</label>
                    <input name="featured" class="form-control" type="file">
                </div>
                <div class="form-group">
                    <label for="category_id">Select a category</label>
                    <select name="category_id" id="category" class="form-control" value="{{$post->category_id}}">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"
                                @if( $post->category->id == $category->id)
                                    selected
                                @endif
                                
                                >{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                        <label for="tags">Select some tags</label>
                        @foreach($tags as $tag)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{$tag->id}}"
                            
                            @foreach($post->tags as $t)
                                @if( $tag->id == $t->id)
                                    checked
                                @endif
                            @endforeach
                            
                            name="tags[]">
                                <label class="form-check-label" for="tags[]">
                                  {{$tag->tag}}
                                </label>
                              </div>
                        @endforeach
                    </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" cols="30" rows="5" class="form-control">{{$post->content}}</textarea>
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