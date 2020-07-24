@extends('Backend.layouts.backend_head')
@section('head', 'Posts')
@section('head_name', 'Dashboard')
@section('sub_name', 'Posts')
@section('content')
    <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="panel panel-default">
            <div class="panel-heading"><h6 class="panel-title"><i class="icon-bug"></i> ADD POST</h6></div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Pick Up Time:</label>
                                <input type="time" class="form-control" id="post_pick_up_time" name="post_pick_up_time" >
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Accessory Weight:</label>
                                <input type="text" class="form-control" id="accessory_weight" name="accessory_weight" placeholder="Accessory Weight">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Description:</label>
                                <input type="text" class="form-control" id="description" name="description" placeholder="Description">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading"><h4 class="panel-title"><i class="fa fa-truck fa-2x"></i> Pick Up Address</h4></div>
                    


                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Division Name:</label>
                            <select class="select-full" name="division_name" id="division_name">
                                <option value="" selected>Select One</option>
                                @foreach($division as $value)
                                <option value="{{$value->division_id}}">{{$value->division_name}}</option>
                                @endforeach
                            </select>
                            @if($errors->first('division_name'))
                                <label for="division_name" class="error">{{$errors->first('division_name')}}</label>
                            @endif
                        </div>
                    </div>
                </div>

                        <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label>District Name:</label>
                            <select class="select-full" name="district_name" id="district_name">
                                <option value="" selected>Select One</option>
                            </select>
                            @if($errors->first('district_name'))
                                <label for="district_name" class="error">{{$errors->first('district_name')}}</label>
                            @endif
                        </div>
                    </div>
                </div>


                        <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Upzilla Name:</label>
                            <select class="select-full" name="upzilla_name" id="upzilla_name">
                                <option value="" selected>Select One</option>
                            </select>
                            @if($errors->first('upzilla_name'))
                                <label for="upzilla_name" class="error">{{$errors->first('upzilla_name')}}</label>
                            @endif
                        </div>
                    </div>
                </div>



                    </div>
                </div>

            </div>

            <div class="panel panel-default">
                <div class="panel-heading"><h4 class="panel-title"><i class="fa fa-truck fa-2x"></i> Post Pick Drop Address</h4></div>
                    


                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Division Name:</label>
                            <select class="select-full" name="division_name" id="division_name">
                                <option value="" selected>Select One</option>
                                @foreach($division as $value)
                                <option value="{{$value->division_id}}">{{$value->division_name}}</option>
                                @endforeach
                            </select>
                            @if($errors->first('division_name'))
                                <label for="division_name" class="error">{{$errors->first('division_name')}}</label>
                            @endif
                        </div>
                    </div>
                </div>

                        <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label>District Name:</label>
                            <select class="select-full" name="district_name" id="district_name">
                                <option value="" selected>Select One</option>
                            </select>
                            @if($errors->first('district_name'))
                                <label for="district_name" class="error">{{$errors->first('district_name')}}</label>
                            @endif
                        </div>
                    </div>
                </div>


                        <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Upzilla Name:</label>
                            <select class="select-full" name="upzilla_name" id="upzilla_name">
                                <option value="" selected>Select One</option>
                            </select>
                            @if($errors->first('upzilla_name'))
                                <label for="upzilla_name" class="error">{{$errors->first('upzilla_name')}}</label>
                            @endif
                        </div>
                    </div>
                </div>


                    </div>
                </div>

            </div>

            <div class="form-actions text-right">
                <input type="reset" value="Cancel" class="btn btn-danger">
                <input type="submit" value="Submit report" class="btn btn-primary">
            </div>
            
        </div>
        

    </form>
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('backend_assets/js/posts.js')}}"></script>
@endsection
