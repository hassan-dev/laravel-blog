@extends('layouts.app')


@section('content')

    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <th>
                    Name
                </th>
                <th>
                    Edit
                </th>
                <th>
                    Delete
                </th>
                </thead>

                <tbody>
                    @if($category->count()>0)
                        @foreach($category as $cat)
                            <tr>
                                <td>
                                    {{$cat -> name}}
                                </td>
                                <td>
                                    <a href="{{route('category.edit', ['id' => $cat-> id])}}" class="text-primary"><i class="fas fa-edit fa-2x"></i></a>
                                </td>
                                <td>
                                    <a href="{{route('category.delete', ['id' => $cat-> id])}}" class="text-danger fa-2x"><i class="fas fa-trash-alt"></i></a>
                                </td>
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