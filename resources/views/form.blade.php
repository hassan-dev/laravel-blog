{{--@extends('layouts.app')--}}



<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>



<script>
    $(document).ready(function(){
       $('#btn').click(function(){
          var name = $('#name').val();
          var email = $('#email').val();
          var password = $('#password').val();
          var phone = $('#phone').val();
          var address = $('#address').val();
          var token = $('#token').val();

          $.ajax({
             type: 'post',
             data: 'name=' + name + '&email=' + email + '&password=' + password + '&phone=' +
                 phone + '&address=' + address + '&_token=' + token,
              url: "<?php echo url('/form/save') ?>",
              success:function(data){
                  // console.log(data);

                  toastr.success("{{ Session::get('success') }}")
           }
           })

       });
    });
</script>










<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
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

                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control" id="phone" placeholder="Enter phone">
                </div>

                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" id="address" placeholder="Enter address">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn">Save changes</button>
            </div>
        </div>
    </div>
</div>















