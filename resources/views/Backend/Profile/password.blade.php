@extends('Backend.layouts.backend_head')
@section('title', '|| Password Change')
@section('head', 'Password Change')
@section('head_name', 'Dashboard')
@section('sub_name', 'Password Change')
@section('content')

<form id="password_form">
    <div class="modal-dialog">
    	<div class="modal-body">
        <div class="panel panel-default">
            <div class="panel-heading"><h6 class="panel-title"><i class="icon-bug"></i> Password Change</h6></div>
            <div class="modal-body">
            	
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Current Password:</label>
                        <div class="col-lg-8">
                        <input id="current_password" type="password" class="form-control" name="password" required autocomplete="new-password" placeholder="Current Password">                
                    </div>
                    <span id="icon" class="col-lg-1"></span>
                    </div><br>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">New Password:</label>
                        <div class="col-lg-8">
                            <input id="new_password" type="password" class="form-control" name="new_password" required autocomplete="new-password" placeholder="New Password" disabled>
                        </div>
                    </div><br>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Confirm Password:</label>
                        <div class="col-lg-8">
                            <input id="retype_password" type="password" class="form-control" name="retype_password" required autocomplete="new-password" placeholder="Confirm Password" disabled>
                        </div>
                        <span id="re_icon" class="col-lg-1"></span>
                    </div><br>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="submit" class="btn btn-primary">Submit</button>
            </div>
</div>
</div>
</form>
@endsection
@section('script')
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script type="text/javascript">
    $(document).ready(function(){
    $("#current_password").keyup(function(){
        var current_password = $(this).val();
        $.ajax({
            url:"{{route('password')}}",
            type:'get',
            data:{current_password:current_password},
            success:function(data){
                if (data=="Matched") 
                {
                    $("#icon").html("<i style='color: green; font-size:20px' class='far fa-grin-alt'></i>");
                    $("#submit").attr("disabled",'disabled');
                    $("#new_password").removeAttr("disabled",'disabled');
                    $("#retype_password").removeAttr("disabled",'disabled');
                    $("#retype_password").keyup(function(){
                        var retype_password=$(this).val();
                        var new_password=$("#new_password").val();
                        if (retype_password !='' && retype_password == new_password) 
                        {
                            $("#re_icon").html("<i style='color: green; font-size:20px' class='far fa-grin-alt'></i>");  
                            $("#submit").removeAttr("disabled",'disabled'); 
                        }
                        else
                        {
                            $("#re_icon").html("<i style='color: red; font-size:20px' class='far fa-frown'></i>");
                            $("#submit").attr("disabled", 'disabled');

                        }
                    });

                }
                else
                {
                    $("#icon").html("<i style='color: red; font-size:20px' class='far fa-frown'></i>");
                    $("#submit").attr("disabled",'disabled');
                    $("#new_password").attr("disabled",'disabled');
                    $("#retype_password").attr("disabled",'disabled');
                }
            }
        });
    });
    $("#password_form").submit(function(e) {
        e.preventDefault();
        var password = $("#retype_password").val();

        $.ajax({
            url     : "password/store",
            data    : {
                password:password
            },
            type    : "post",
            dataType: "json",
            success: function(data) {
                if(data.msgtype=="success") {
                toastr.success(data.message, "Success!");
                window.location.replace("/admin");
                }
            }  
        });
    });
});


</script>
@endsection