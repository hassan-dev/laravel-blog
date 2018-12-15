@extends('layouts.app')


@section('content')

    @include('admin.includes.error')

    <div class="panel panel-default">
        <div class="panel-heading">
            Edit your profile
        </div>

        <div class="panel-body">
            <form action="{{route('update.profile')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$user->name}}">
                </div>

                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="email" class="form-control" name="email" value="{{$user->email}}">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="enter new password">
                </div>

                <div class="form-group">
                    <label for="avatar">Avatar</label>
                    <input type="file" class="form-control" name="avatar">
                </div>

                <div class="form-group">
                    <label for="facebook">Facebook</label>
                    <input type="text" class="form-control" name="facebook" value="{{$user->profile->facebook}}">
                </div>

                <div class="form-group">
                    <label for="youtube">Youtube</label>
                    <input type="text" class="form-control" name="youtube" value="{{$user->profile->youtube}}">
                </div>

                <div class="form-group">
                    <label for="about">About</label>
                    <textarea name="about" class="form-control" id="about" cols="5" rows="4">{{$user->profile->about}}</textarea>
                </div>

                <div class="text-center">
                    <button class="btn btn-success" type="submit">Update profile</button>
                </div>
            </form>
        </div>
    </div>

@stop