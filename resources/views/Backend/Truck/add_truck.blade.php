@extends('Backend.layouts.backend_head')
@section('title', '|| Add Truck')
@section('head', 'Add Truck')
@section('head_name', 'Dashboard')
@section('sub_name', 'Add Truck')
@section('content')
    <form action="{{route('truck.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="panel panel-default">
            <div class="panel-heading"><h6 class="panel-title"><i class="icon-bug"></i> ADD Truck</h6></div>
            <div class="panel-body">

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Truck Number:</label>
                            <input type="text" class="form-control" name="truck_number" id="truck_number" placeholder="Truck Number"
                                   value="{{old('truck_number')}}">
                            @if($errors->first('truck_number'))
                                <label for="truck_number" class="error">{{$errors->first('truck_number')}}</label>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Ton:</label>
                            <select class="select-full" name="ton" id="ton">
                                <option value="" selected>Select One</option>
                                @foreach($ton as $value)
                                    <option value="{{$value->ton_id}}">{{$value->ton_number}}</option>
                                @endforeach
                            </select>
                            @if($errors->first('ton'))
                                <label for="ton" class="error">{{$errors->first('ton')}}</label>
                            @endif
                        </div>
                    </div>
                </div>

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

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Home Address:</label>
                            <input type="text" class="form-control" name="home_address" id="home_address" placeholder="Home Address"
                                   value="{{old('home_address')}}">
                            @if($errors->first('home_address'))
                                <label for="home_address" class="error">{{$errors->first('home_address')}}</label>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <label for="input-file-now">Truck Image</label>
                                    <input type="file" id="input-file-now" name="images[]"  class="dropify" />
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success" id="plus"><i class="fa fa-plus-circle"></i></button>
                    </div>
                </div>
                <div class="input_field"></div>

                <div class="form-actions text-right">
                    <input type="reset" value="Cancel" class="btn btn-danger">
                    <input type="submit" value="Submit report" class="btn btn-primary">
                </div>

            </div>
        </div>
    </form>
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('backend_assets/js/truck.js')}}"></script>
@endsection
