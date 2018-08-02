@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
            <table class="table table-hover">
                    <thead>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Editing</th>
                        <th>Deleting</th>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td><img src="{{$post->featured}}" height="50"> </td>
                                <td>{{$post->title}}</td>
                                <td>
                                    <a href="{{route('posts.edit',['id' => $post->id])}}" class="btn btn-xs btn-info">
                                        <span class="fa fa-pencil"></span>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('posts.trash',['id' => $post->id])}}" class="btn btn-xs btn-danger">
                                        <span class="fa fa-trash-o"></span>    
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
    </div>
</div>
    
@stop