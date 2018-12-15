@extends('layouts.app')


@section('content')

    <div class="panel panel-default">
        <div class="panel panel-head">
            <div class="bg-primary text-center" style="padding-top: 5px; padding-bottom: 5px; font-weight: bolder">My Posts</div>
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <th>ID</th>
                <th>Featured</th>
                <th>Title</th>
                <th>Edit</th>
                <th>Trash</th>
                </thead>
                <tbody>
                <span style="visibility: hidden">{{$check = 1}}</span>
                @if($posts -> count() >0 )
                    <span style="visibility: hidden">{{$check = 1}}</span>
                    @foreach($posts as $post)
                        @if(Auth::user()->id == $post -> user_id)
                        <tr>
                            <td>{{$post -> id}}</td>
                            <td><img src="{{$post -> featured}}" height="50px" width="70px"></td>
                            <td>{{$post -> title}}</td>
                            <td><a href="{{route('post.edit', ['id' => $post->id])}}"><i class="fas fa-edit fa-2x"></i></a></td>
                            <td><a href="{{route('post.delete', ['id' => $post->id ])}}" class="text-danger"><i class="fas fa-trash-alt fa-2x"></i></a></td>
                        </tr>
                        <span style="visibility: hidden">{{$check = 0}}</span>

                        @endif

                    @endforeach
                @endif
                {{--{{$check = 0}}--}}
                @if($check != 0)
                    <tr>
                        <th colspan="5" class="text-center"><img src="{{asset('uploads/posts/no record found.png')}}" alt="not found"> </th>
                    </tr>

                @endif

                </tbody>
            </table>
        </div>
    </div>

@stop