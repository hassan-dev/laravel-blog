@extends('layouts.app')


@section('content')

    @include('admin.includes.error')

    <div class="panel panel-default">
        <div class="panel-heading">
            ~Create a new Tag~
        </div>

        <div class="panel-body">
            <form action="{{route('tag.store')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="tag" placeholder="enter tag name">
                </div>

                <div class="text-center">
                    <button class="btn btn-success" type="submit">Store</button>
                </div>
            </form>
        </div>
    </div>

@stop