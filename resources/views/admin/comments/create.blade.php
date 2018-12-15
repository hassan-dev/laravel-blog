@extends('layouts.app')


@section('content')


    <div class="panel panel-default">
        <div class="panel-heading">
            ~Create a new post~
        </div>
        <div class="panel-body">

            <form action="{{route('comment.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="form-gorup">
                    <label for="content">Content</label>
                    <textarea id="summernote" name="comment" class="form-control" cols="5" rows="8"></textarea>
                </div><br>

                <div class="text-center">
                    <button class="btn btn-success">Submit</button>
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