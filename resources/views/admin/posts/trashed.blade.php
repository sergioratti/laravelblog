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
                                    <a href="{{route('posts.restore',['id' => $post->id])}}" class="btn btn-xs btn-success">
                                        Restore
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('posts.delete',['id' => $post->id])}}" class="btn btn-xs btn-danger">
                                        Permanently remove    
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
    </div>
</div>
    
@stop