@extends('Backend.layouts.backend_head')
@section('head', 'Posts')
@section('head_name', 'Dashboard')
@section('sub_name', 'Add Posts')
@section('content')
    <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="panel panel-default">
            <div class="panel-heading"><h6 class="panel-title"><i class="icon-bug"></i> Post Details</h6></div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Pick Up Time:</label>
                            <input type="time" class="form-control" id="post_pick_up_time" name="post_pick_up_time" >
                            @if($errors->first('post_pick_up_time'))
                                <label for="post_pick_up_time" class="error">{{$errors->first('post_pick_up_time')}}</label>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Accessory Weight:</label>
                            <input type="text" class="form-control" id="accessory_weight" name="accessory_weight" placeholder="Accessory Weight">
                            @if($errors->first('accessory_weight'))
                                <label for="accessory_weight" class="error">{{$errors->first('accessory_weight')}}</label>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Description:</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="Description">
                            @if($errors->first('description'))
                                <label for="description" class="error">{{$errors->first('description')}}</label>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading"><h4 class="panel-title"><i class="fa fa-truck fa-2x"></i> Pick Up Address</h4></div>

            <div class="panel-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Division Name:</label>
                            <select class="select-full" name="division_name1" id="division_name1">
                                <option value="" selected>Select One</option>
                                @foreach($division as $value)
                                <option value="{{$value->division_id}}">{{$value->division_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label>District Name:</label>
                            <select class="select-full" name="district_name1" id="district_name1">
                                <option value="" selected>Select One</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Upzilla Name:</label>
                            <select class="select-full" name="upzilla_name1" id="upzilla_name1">
                                <option value="" selected>Select One</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Home Address:</label>
                            <input type="text" class="form-control" name="home_address1" id="home_address1" placeholder="John Doe"
                                   value="{{old('home_address1')}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading"><h4 class="panel-title"><i class="fa fa-truck fa-2x"></i> Post Pick Drop Address</h4></div>

            <div class="panel-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Division Name:</label>
                            <select class="select-full" name="division_name2" id="division_name2">
                                <option value="" selected>Select One</option>
                                @foreach($division as $value)
                                <option value="{{$value->division_id}}">{{$value->division_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label>District Name:</label>
                            <select class="select-full" name="district_name2" id="district_name2">
                                <option value="" selected>Select One</option>
                            </select>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Upzilla Name:</label>
                            <select class="select-full" name="upzilla_name2" id="upzilla_name2">
                                <option value="" selected>Select One</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Home Address:</label>
                            <input type="text" class="form-control" name="home_address2" id="home_address2" placeholder="John Doe"
                                   value="{{old('home_address2')}}">
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="form-actions text-right">
            <input type="reset" value="Cancel" class="btn btn-danger">
            <input type="submit" value="Submit report" class="btn btn-primary">
        </div>
    </form>
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('backend_assets/js/posts.js')}}"></script>
@endsection
