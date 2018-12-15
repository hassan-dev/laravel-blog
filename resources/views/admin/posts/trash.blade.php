@extends('layouts.app')


@section('content')

    <div class="panel panel-default">
        <div class="panel panel-head">
            <div class="bg-danger text-center" style="padding-top: 5px; padding-bottom: 5px; font-weight: bolder">Trashed Posts</div>
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <th>ID</th>
                <th>Featured</th>
                <th>Title</th>
                <th>Restore</th>
                <th>Destroy</th>
                </thead>
                <tbody>
                    @if($posts->count()>0)
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post -> id}}</td>
                                <td><img src="{{$post -> featured}}" height="50px" width="70px"></td>
                                <td>{{$post -> title}}</td>
                                <td><a href="{{route('post.restore', ['id' => $post->id ])}}" class="text-primary"><i class="fas fa-recycle fa-2x"></i></a></td>
                                <td><a href="{{route('post.kill', ['id' => $post->id ])}}" class="text-danger"><i class="fas fa-trash-alt fa-2x"></i></a></td>
                            </tr>
                        @endforeach
                     @else
                         <tr>
                             <th colspan="5" class="text-center"><img src="{{asset('uploads/posts/no record found.png')}}" alt="not found"> </th>
                         </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

@stop