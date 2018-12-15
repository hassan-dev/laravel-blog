@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-body text-center">

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">
                Add Tag
            </button>

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
                <tbody id="data">
                {{--data is coming from ajaxTags view--}}
                </tbody>

            </table>
        </div>
    </div>
@stop

{{--css--}}
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
{{--js and jQ--}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

{{--jQuery and ajax code--}}
<script>
    $(document).ready(function(){
        $('#btn').click(function(){
            var tag = $('#tag').val();
            var token = $('#token').val();

            $.ajax({
                type: 'post',
                data: 'tag=' + tag  + '&_token=' + token,
                url: "<?php echo url('/admin/tag/store') ?>",
                success:function(data){
                    // console.log(data);

                    toastr.success("Tag created")
                }
            })

        });
// autoload function
        var auto_refresh = setInterval(
            function(){
                $('#data').load('<?php echo url('/ajaxTags');?>').fadeIn("slow");
            },1000);
    });
</script>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add new tag</h4>
            </div>
            <div class="modal-body">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <input type="hidden" id="token" value="{{csrf_token()}}">
                <div class="form-group">
                    <label>Tag</label>
                    <input type="text" class="form-control" id="tag" placeholder="Enter tag">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn">Add tag</button>
            </div>
        </div>
    </div>
</div>























