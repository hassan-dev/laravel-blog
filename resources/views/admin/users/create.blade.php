@extends('layouts.app')


@section('content')

    @include('admin.includes.error')
    <div class="container">
        <div class="row"></div>
        <div class="col-md-8">
    <div class="panel panel-default">
        <div class="panel-heading">
            Create a new user
        </div>

        <div class="panel-body">
            <form action="{{route('user.store')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Your name">
                </div>

                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter email">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>

                <div class="text-center">
                    <button class="btn btn-success" type="submit">Sign up</button>
                </div>
            </form>
        </div>
    </div>
        </div>
    </div>
@stop