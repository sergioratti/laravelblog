@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
            <table class="table table-hover">
                    <thead>
                        <th>Category Name</th>
                        <th>Editing</th>
                        <th>Deleting</th>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->name}}</td>
                                <td>
                                    <a href="{{route('categories.edit',['id' => $category->id])}}" class="btn btn-xs btn-info">
                                        <span class="fa fa-pencil"></span>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('categories.delete',['id' => $category->id])}}" class="btn btn-xs btn-danger">
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