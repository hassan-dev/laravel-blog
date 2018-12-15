@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel panel-head">
            <div class="bg-primary text-center" style="padding-top: 5px; padding-bottom: 5px; font-weight: bolder">Users</div>
        </div>
        <div class="panel-body" >
                <table class="table table-hover">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">
                        Add User
                    </button>
                    <thead>
                    <th>Avatar</th>
                    <th>Name</th>
                    <th>Permissions</th>
                    <th>Delete</th>
                    </thead>
                    <tbody id="data">
                    {{--Data is coming from ajaxUser.blade--}}
                    </tbody>
                </table>
                </tbody>
            </table>
        </div>
    </div>
@stop


{{--Modal and ajax code--}}
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

{{--jQuery--}}
<script>
    $(document).ready(function() {
        $('#btn').click(function () {
            var name = $('#name').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var phone = $('#phone').val();
            var address = $('#address').val();
            var token = $('#token').val();
// Ajax
            $.ajax({
                type: 'post',
                data: 'name=' + name + '&email=' + email + '&password=' + password + '&phone=' +
                    phone + '&address=' + address + '&_token=' + token,
                url: "<?php echo url('/user/store') ?>",
                success: function (data) {
                    toastr.success("User added")
                }
            })
        });
        // auto-load function
        var auto_refresh = setInterval(
            function(){
                $('#data').load('<?php echo url('/ajaxUsers');?>').fadeIn("slow");
            },1000);

    });
</script>



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add User</h4>
            </div>
            <div class="modal-body">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <input type="hidden" id="token" value="{{csrf_token()}}">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter password">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn">Add</button>
            </div>
        </div>
    </div>
</div>