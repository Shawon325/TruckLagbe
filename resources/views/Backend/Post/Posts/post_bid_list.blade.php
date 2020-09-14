@extends('Backend.layouts.backend_head')
@section('title', '|| Posts Bid List')
@section('head', 'Posts Bid List')
@section('head_name', 'Dashboard')
@section('sub_name', 'Posts Bid List')
@section('content')
    <div class="tabbable page-tabs">
        <div class="tab-content">
            <div class="tab-pane active fade in" id="inside">
                <div class="panel panel-default">
                    <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i> View All Image</h6>
                    </div>
                    <div class="datatable">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Truck Number</th>
                                <th>Phone Number</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($post_bid as $key => $value)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$value->truck_number}}</td>
                                    <td>{{$value->phone_number}}</td>
                                    <td>{{$value->bid_amount}}</td>
                                    <td>
                                        @if ($value->status === 1)
                                            <button class="btn btn-success" id="bid_status" data="{{$value->post_bid_id}}">
                                                <i class="fa fa-refresh"
                                                   aria-hidden="true"></i>
                                            </button>
                                        @else
                                            <button class="btn btn-danger" id="bid_status" data="{{$value->post_bid_id}}">
                                                <i class="fa fa-refresh"
                                                   aria-hidden="true"></i>
                                            </button>
                                        @endif
{{--                                            <button class="btn btn-info view" data-toggle="modal" data="{{$value->post_bid_id}}"--}}
{{--                                                    data-target="#view_bid_info"><i class="fa fa-eye" aria-hidden="true"></i></button>--}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- View Bid Information -->
    <form id="view_bid_form">
        <div id="view_bid_info" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">View Pesonal Info</h5>
                    </div>
                    <div class="modal-body">
                        <div class="panel-body">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">User Name:</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="name" name="name" disabled>
                                    </div>
                                </div>
                                <br><br>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Email Address:</label>
                                    <div class="col-lg-9">
                                        <input type="email" class="form-control" id="email" name="email" readonly="">
                                    </div>
                                </div><br><br>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Gender:</label>
                                    <div class="col-lg-9">
                                        <input class="custom-control-input gender" type="radio" id="male" name="gender" value="1" readonly="">
                                        <label for="male" class="custom-control-label">Male</label>
                                        <input class="custom-control-input gender" type="radio" id="female" name="gender" value="2" readonly="">
                                        <label for="female" class="custom-control-label">Female</label>
                                    </div>
                                </div><br>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Number:</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="contact" name="contact" readonly="">
                                    </div>
                                </div><br><br>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Image:</label>
                                    <div class="col-lg-9">
                                        <img style="height: 200px; width: 200px; border-radius: 100px;" name="image" id='previmage'  alt="image" class='img-responsive'>
                                        <br><br>
                                    </div>
                                </div><br><br>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger" id="close" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <br><br><br>
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('backend_assets/js/posts.js')}}"></script>
@endsection
