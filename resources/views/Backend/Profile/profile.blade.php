@extends('Backend.layouts.backend_head')
@section('title', '|| Profile Change')
@section('head', 'Profile Change')
@section('head_name', 'Dashboard')
@section('sub_name', 'Profile Change')
@section('content')
<div class="modal-dialog">
    <form id="user_form" action="{{route('profile.store')}}" class="form-horizontal"  method="post" enctype="multipart/form-data">@csrf
    <div class="modal-body">
        <div class="panel panel-default">
            <div class="panel-heading"><h6 class="panel-title"><i class="icon-user"></i> Profile Change</h6></div>
            <div class="panel-body"> 

        <div class="panel-body">
            <div class="form-group">
                <label class="col-lg-3 control-label">User Name:</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="name" placeholder="User Name" value="{{Auth::user()->name}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Email Address:</label>
                <div class="col-lg-9">
                    <input type="email" class="form-control" name="email" placeholder="User Email" value="{{Auth::user()->email}}" readonly="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Gender:</label>
                <div class="col-lg-9">
                    <input class="custom-control-input gender" type="radio" id="male" name="gender" value="1" {{Auth::user()->gender=='1' ? 'checked' : '' }} required>
                    <label for="male" class="custom-control-label">Male</label>
                    <input class="custom-control-input gender" type="radio" id="female" name="gender" value="2" {{Auth::user()->gender=='2' ? 'checked' : '' }} required>
                    <label for="female" class="custom-control-label">Female</label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Number:</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="contact" placeholder="User Contact Number" value="{{Auth::user()->contact}}" required="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Image:</label>
                <div class="col-lg-9">
                    <img style="height: 200px; width: 200px; border-radius: 100px;" name="image" id='previmage' src="{{Auth::user()->image==''? asset('backend_assets/images/default-logo.jpg'): '/'.Auth::user()->image}}" alt="image" class='img-responsive'>
                    <br><br>
                    <input type='file' id="image" name="image" onchange="readURL(this);" />
                    <span class="text-danger" id="image"></span>
                </div>
                <input type="hidden" name="old_img" id="old_img" value="{{Auth::user()->image}}">
            </div>
        </div>
    </div>
    </div>
    </div>
    <div class="modal-footer">
        <button id="submit" type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
</div>
@endsection
@section('script')
    <script type="text/javascript">
        $("#email").click(function() {
        $("#email").prop("readonly", true);
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#previmage')
                        .attr('src', e.target.result)
                        .width(200)
                        .height(200);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection