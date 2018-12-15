@extends('layouts.app')


@section('content')

    @if(count($errors)>0)



        <ul class="list-group">
            @foreach($errors->all() as $error)
                <li class="list-group-item text-danger">
                    {{$error}}
                </li>
            @endforeach
        </ul>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">
            Edit blog settings
        </div>
        <div class="panel-body">

            <form action="{{route('settings.update')}}" method="post">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="name">Website name</label>
                    <input type="text" name="site_name" class="form-control" value="{{$settings->site_name}}">
                </div>

                <div class="form-group">
                    <label for="email">Contact email</label>
                    <input type="email" name="contact_email" class="form-control" value="{{$settings->contact_email}}">
                </div>

                <div class="form-group">
                    <label for="number">Contact number</label>
                    <input type="text" name="contact_number" class="form-control" value="{{$settings->contact_number}}">
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control" value="{{$settings->address}}">
                </div>

                <div class="form-group">
                    <label for="sub_address">Second address</label>
                    <input type="text" name="sub_address" class="form-control" value="{{$settings->sub_address}}">
                </div>

                <div class="form-group">
                    <label for="working_hours">Working hours</label>
                    <input type="text" name="working_hours" class="form-control" value="{{$settings->working_hours}}">
                </div>

                <div class="form-group">
                    <label for="about">About</label>
                    <textarea class="form-control" name="about" id="" cols="5" rows="5">{{$settings->about}}</textarea>
                </div>



                <div class="text-center">
                    <button class="btn btn-success">Update</button>
                </div>

            </form>
        </div>

    </div>

@stop


@section('style')

    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
@stop


@section('script')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

    <script>
        $('#summernote').summernote({
            placeholder: 'Post content here 😝',
            tabsize: 2,
            height: 200
        });
    </script>
@stop