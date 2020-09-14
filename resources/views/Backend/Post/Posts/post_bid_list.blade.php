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
                                            <button class="btn btn-success" id="bid_status"
                                                    data="{{$value->post_bid_id}}">
                                                <i class="fa fa-refresh"
                                                   aria-hidden="true"></i>
                                            </button>
                                        @else
                                            <button class="btn btn-danger" id="bid_status"
                                                    data="{{$value->post_bid_id}}">
                                                <i class="fa fa-refresh"
                                                   aria-hidden="true"></i>
                                            </button>
                                        @endif
{{--                                        <button class="btn btn-success" id="bid_truck_id" data-toggle="modal"--}}
                                            {{--                                                data-target="#add_ton"--}}
                                            {{--                                                data="{{$value->truck_driver_id}}">--}}
                                            {{--                                            <i class="fa fa-eye"--}}
                                            {{--                                               aria-hidden="true"></i>--}}
                                            {{--                                        </button>--}}
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

    <form id="ton_form">
        <div id="add_ton" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Truck Driver Overview</h5>
                    </div>
                    <div class="modal-body">
                        <div class="panel-body">
                            <div class="col-md-12">
                                <div class="panel panel-flat">

                                    <div class="panel-body">
                                        <div class="row">

                                            <div class="col-lg-9" style="margin-left: 12%;">
                                                <center>
                                                    <div>
                                                        <img id="image" src="" style="height: 300px">
                                                    </div>
                                                </center>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="panel-body">

                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Name:</label>
                                            <div class="col-lg-9"></div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Email:</label>
                                            <div class="col-lg-9"></div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Phone:</label>
                                            <div class="col-lg-9"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('backend_assets/js/posts.js')}}"></script>
@endsection
