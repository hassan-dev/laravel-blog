@extends('layouts.app')


@section('content')

    @include('admin.includes.error')

    <div class="panel panel-default">
        <div class="panel-heading">
            ~Create a new category~
        </div>

        <div class="panel-body">
            <form action="{{route('category.store')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="enter category name">
                </div>

                <div class="text-center">
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>

@stop