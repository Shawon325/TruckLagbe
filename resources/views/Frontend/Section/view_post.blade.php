@extends('Frontend.Layouts.head')

@section('main_content')
@section('css')
    <link href="{{asset('frontend_assets/assets/css/view_post.css')}}" rel="stylesheet">
@endsection

    <section class="post-main">
    <div class="container ">
        <div class="row ">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-10"><h2><b>View Post</b></h2></div>
                    <div class="col-md-2">
                        <button style="margin-left: -11px;" class="btn btn-info" data="{{$view_post->post_id}}"
                                data-toggle="modal"
                                data-target="#bidModal"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Bid Post
                        </button>
                    </div>
                </div>
                <header></header>
                <br>
                <div class="card border-success">
                    <div class="card-body info-body">
                        <ul class="list-group info-body">
                            <li class="list-group-item info-body">
                                <div class="row info-body">
                                    <div class="col-md-4 ">Pick Up Address
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-1">
                                                <img style="max-width: 2rem; max-height: 2rem; float: left;"
                                                     src="{{asset('frontend_assets/assets/img/location-1.png')}}"
                                                     class="rounded mx-auto d-block" alt="...">
                                            </div>
                                            <div class="col-md-11">

                                                {{$view_post->pick_up_address->division->division_name}}
                                                ,{{$view_post->pick_up_address->district->district_name}}
                                                ,{{$view_post->pick_up_address->upzilla->upzilla_name}}
                                                ,{{$view_post->pick_up_address->home_address}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item info-body">
                                <div class="row info-body">
                                    <div class="col-md-4">Pick Down Address</div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-1">
                                                <img style="max-width: 2rem; max-height: 2rem; float: left;"
                                                     src="{{asset('frontend_assets/assets/img/location-1.png')}}"
                                                     class="rounded mx-auto d-block" alt="...">
                                            </div>
                                            <div class="col-md-11">
                                                {{$view_post->pick_down_address->division->division_name}}
                                                ,{{$view_post->pick_down_address->district->district_name}}
                                                ,{{$view_post->pick_down_address->upzilla->upzilla_name}}
                                                ,{{$view_post->pick_down_address->home_address}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item info-body">
                                <div class="row info-body">
                                    <div class="col-md-4">Pick Up Date</div>
                                    <div class="col-md-8">{{$view_post->assign_date}}</div>
                                </div>
                            </li>
                            <li class="list-group-item info-body">
                                <div class="row info-body">
                                    <div class="col-md-4">Pick Up time</div>
                                    <div class="col-md-8">{{$view_post->post_pick_up_time}}</div>
                                </div>
                            </li>
                            <li class="list-group-item info-body">
                                <div class="row info-body">
                                    <div class="col-md-4">Accessory Weight</div>
                                    <div class="col-md-8">{{$view_post->accessory_weight}}</div>
                                </div>
                            </li>
                            <li class="list-group-item info-body">
                                <div class="row info-body">
                                    <div class="col-md-4">Budget</div>
                                    <div class="col-md-8">{{$view_post->budget}}</div>
                                </div>
                            </li>
                            <li class="list-group-item info-body">
                                <div class="row info-body">
                                    <div class="col-md-4">Description</div>
                                    <div class="col-md-8">{{$view_post->description}}</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div>
    <br>
    </section>

    <form id="bid_form">
        <div id="bidModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><b>Bid</b></h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="panel-body">

                            <input class="form-control" type="hidden" name="post_id" value="{{$view_post->post_id}}">

                            <div class="form-group">
                                <label class="form-group">Truck Number:</label>
                                <input class="form-control" type="text" name="truck_number"
                                       placeholder="Enter truck number....">
                            </div>

                            <div class="form-group">
                                <label class="form-group">Phone Number:</label>
                                <input class="form-control" type="text" name="phone_number"
                                       placeholder="Enter truck number....">
                            </div>
                            <div class="form-group">
                                <label class="form-group">Bid Amount:</label>
                                <input class="form-control" type="number" name="bid_amount" value="0">
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
                        @auth()
                            <button type="submit" class="btn btn-dark">Bid</button>
                        @endauth
                        @guest()
                            <button type="submit" class="btn btn-dark"><a href="/login">Login</a></button>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
@section('front_script')
    <script src="{{asset('frontend_assets/assets/js/frontend.js')}}"></script>
@endsection
