@extends('layouts.app')


@section('content')

    @include('admin.includes.error')

    <div class="panel panel-default">
        <div class="panel-heading" style="background: #17A2B8; color: white">
            Edit category: <b>{{$category->name}}</b>
        </div>

        <div class="panel-body">
            <form action="{{route('category.update', ['id' => $category->id])}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$category->name}}">
                </div>

                <div class="text-center">
                    <button class="btn btn-success" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>

@stop