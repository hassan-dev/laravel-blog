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
            ~Edit post: {{$post->title}}~
        </div>
        <div class="panel-body">

            <form action="{{route('post.update', ['id' => $post->id])}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="{{$post->title}}">
                </div>

                <div class="form-group">
                    <label for="featured">Featured image</label>
                    <input type="file" name="featured" class="form-control">
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"

                                        @if($post->category->id == $category->id)
                                            selected
                                        @endif

                            >{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    @foreach($tags as $tag)
                        <label class="checkbox-inline"><input type="checkbox" name="tags[]"  value="{{$tag->id}}"

                             @foreach($post->tags as $t)
                                    @if($tag->id == $t->id)
                                        checked
                                    @endif
                             @endforeach
                            >{{$tag->tag}}</label>
                    @endforeach
                </div>

                <div class="form-gorup">
                    <label for="content">Content</label>
                    <textarea id="summernote" name="text" class="form-control" cols="5" rows="5">{{$post->content}}</textarea>
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