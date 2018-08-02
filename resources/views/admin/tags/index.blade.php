@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
            <table class="table table-hover">
                    <thead>
                        <th>Tag</th>
                        <th>Editing</th>
                        <th>Deleting</th>
                    </thead>
                    <tbody>
                        @if($tags->count() > 0)
                        @foreach($tags as $tag)
                            <tr>
                                <td>{{$tag->tag}}</td>
                                <td>
                                    <a href="{{route('tags.edit',['id' => $tag->id])}}" class="btn btn-xs btn-info">
                                        <span class="fa fa-pencil"></span>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('tags.delete',['id' => $tag->id])}}" class="btn btn-xs btn-danger">
                                        <span class="fa fa-trash-o"></span>    
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        @else
                        <tr>
                            <th colspan="3" class="text-center">No tags yet.</th>
                        </tr>
                        @endif
                    </tbody>
                </table>
    </div>
</div>
    
@stop