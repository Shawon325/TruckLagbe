@extends('Backend.layouts.backend_head')
@section('title', '|| General Setting')
@section('head', 'General Setting')
@section('head_name', 'General Setting')
@section('sub_name', 'General Setting')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <form action="{{url('admin/general_setting/'. $general_setting->general_setting_id)}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="panel panel-default">
                    <div class="panel-heading"><h6 class="panel-title"><i class="icon-bug"></i> App Details</h6></div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>App Name:</label>
                                    <input type="text" class="form-control" id="app_name"
                                           name="app_name" placeholder="App Name..."
                                           value="{{$general_setting->app_name}}">
                                    @if($errors->first('app_name'))
                                        <label for="date" class="error">{{$errors->first('app_name')}}</label>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Email:</label>
                                    <input type="text" class="form-control" id="email"
                                           name="email"
                                           placeholder="Email..." value="{{$general_setting->email}}">
                                    @if($errors->first('email'))
                                        <label for=" email"
                                               class="error">{{$errors->first('email')}}</label>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>number:</label>
                                    <input type="text" class="form-control" id="number"
                                           name="number"
                                           placeholder="Phone Number..." value="{{$general_setting->number}}">
                                    @if($errors->first('number'))
                                        <label for=" number"
                                               class="error">{{$errors->first('number')}}</label>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Logo:</label>
                                    <img id='previmage'
                                         style="height: 0%;margin-right: auto;display: block;width: 30%;margin-left: auto;"
                                         src="{{$general_setting->logo ? asset($general_setting->logo) : asset('backend_assets/images/default-logo.jpg')}}"
                                         alt="your image"
                                         class='img-responsive img-circle'>
                                    <br>
                                    <input type="file" name="image" id="image" onchange="readURL(this);"/>
                                    <span class="help-inline"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions text-right">
                            <input type="reset" value="Cancel" class="btn btn-danger">
                            <input type="submit" value="Submit" class="btn btn-primary">
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="row col-md-6" style="margin-top: -19px;">

            <div class="panel-body">
                <div class="col-md-12">
                    <div class="panel panel-flat">

                        <div class="panel-body">
                            <div class="row">

                                <div class="col-lg-9" style="margin-left: 12%;">
                                    <center>
                                        <div>
                                            <img src="{{asset($general_setting->logo)}}" style="height: 300px">
                                        </div>
                                    </center>
                                </div>
                            </div>

                        </div>

                        <div style="border: 1px solid #718096;background: #718096;color: white;">
                            <span style="padding: 5%;font-size: 12px;color: #ffffff;">General Setting Overview</span>
                        </div>

                        <div class="panel-body">

                            <div class="form-group">
                                <label class="col-lg-3 control-label">Application Name:</label>
                                <div class="col-lg-9">
                                    {{ $general_setting->app_name }}
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Email:</label>
                                <div class="col-lg-9">
                                    {{ $general_setting->email }}
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Phone:</label>
                                <div class="col-lg-9">
                                    {{ $general_setting->number }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#previmage')
                        .attr('src', e.target.result)
                        .width(140)
                        .height(140);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function myFunction() {
            window.print();
        }
    </script>
@endsection
