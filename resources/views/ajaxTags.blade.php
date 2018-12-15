<tr>
@if($tags->count()>0)
    @foreach($tags as $tag)
        <tr>
            <td>
                {{$tag -> tag}}
            </td>
            <td>
                <a href="{{route('tag.edit', ['id' => $tag-> id])}}"><i class="fas fa-edit fa-2x"></i></a>
            </td>
            <td>
                <a href="{{route('tag.delete', ['id' => $tag-> id])}}" class="text-danger"><i class="fas fa-trash-alt fa-2x"></i></a>
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <th colspan="5" class="text-center"><img src="{{asset('uploads/posts/no record found.png')}}" alt="not found"> </th>
    </tr>
@endif
</tr>