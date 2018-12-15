@extends('layouts.app')


@section('content')

    @include('admin.includes.error')

    <div class="panel panel-default">
        <div class="panel-heading" style="background: #17A2B8; color: white">
            Edit tag: <b>{{$tag->tag}}</b>
        </div>

        <div class="panel-body">
            <form action="{{route('tag.update', ['id' => $tag->id])}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="tag" value="{{$tag->tag}}">
                </div>

                <div class="text-center">
                    <button class="btn btn-success" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>

@stop