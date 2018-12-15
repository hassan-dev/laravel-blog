@extends('layouts.app')


@section('content')

    <div class="panel panel-default">
        <div class="panel panel-head">
            <div class="bg-primary text-center" style="padding-top: 5px; padding-bottom: 5px; font-weight: bolder">Users</div>
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <th>Avatar</th>
                <th>Name</th>
                <th>Permissions</th>
                <th>Delete</th>
                </thead>
                <tbody>
                @if($posts -> count() >0)
                    @foreach($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            {{--<td>{{$comment->id}}</td>--}}


                            <td><form action="{{route('comment.store', ['id' => $post->id])}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}

                                    <div class="form-gorup">
                                        <label for="content">Content</label>
                                        <textarea id="summernote" name="comment" class="form-control" cols="5" rows="8"></textarea>
                                    </div><br>

                                    <div class="text-center">
                                        <button class="btn btn-success">Submit</button>
                                    </div>

                                </form></td>

                        </tr>

                        @foreach($post->comments as $comment)
                            <tr>
                                <td>
                                    {{$comment->comment}}
                                    {{$comment->user->name}}
                                    {{$comment->user->id}}
                                    <img src="{{asset($comment->user->profile->avatar)}}" height="20px" width="20px">

                                </td>

                            </tr>
                        @endforeach



                    @endforeach

                @endif


                {{--@foreach($comments->user as $user)--}}

                    {{--{{$user->user_id}}--}}
                {{--@endforeach--}}

                </tbody>
            </table>
        </div>
    </div>

@stop