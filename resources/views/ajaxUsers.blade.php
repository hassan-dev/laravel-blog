@if($users -> count() >0)
    @foreach($users as $user)
        <tr>
            <td><img src="{{asset($user->profile->avatar)}}" height="50px" width="50px" style="border-radius: 50%"></td>
            <td>{{$user -> name}}</td>
            <td>

                @if($user->id == "1")
                    <a class="btn btn-warning">Super Admin</a>

                @elseif($user->admin)
                    <a href="{{route('user.not.admin', ['id' => $user-> id])}}" class="btn btn-sm btn-danger">Remove Admin</a>
            <td><a href="{{route('user.delete', ['id' => $user-> id])}}" class="btn btn-sm btn-danger">X</a></td>

            @else
                <a href="{{route('user.admin', ['id' => $user-> id])}}" class="btn btn-sm btn-success">Make Admin</a>
                <td><a href="{{route('user.delete', ['id' => $user-> id])}}" class="btn btn-sm btn-danger">X</a></td>

                @endif
                </td>
        </tr>
    @endforeach
@else
    <tr>
        <th colspan="5" class="text-center"><img src="{{asset('uploads/posts/no record found.png')}}"> </th>
    </tr>
@endif