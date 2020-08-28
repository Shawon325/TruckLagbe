@extends('Backend.layouts.backend_head')
@section('title', '|| Posts Bid')
@section('head', 'Posts Bid')
@section('head_name', 'Dashboard')
@section('sub_name', 'Posts Bid')
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
                                <th>Assign Date</th>
                                <th>Pick Up Time</th>
                                {{--                                <th>Pick Up Address</th>--}}
                                {{--                                <th>Pick Down Address</th>--}}
                                <th>Truck Number</th>
                                <th>Phone Number</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bid_data as $key => $value)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$value->post->assign_date}}</td>
                                    <td>{{$value->post->post_pick_up_time}}</td>
                                    {{--                                    <td>{{$value->post}}</td>--}}
                                    {{--                                    <td>{{$value->post}}</td>--}}
                                    <td>{{$value->truck_number}}</td>
                                    <td>{{$value->phone_number}}</td>
                                    <td>{{$value->bid_amount}}</td>
                                    <td>
                                        @if ($value->status === 1)
                                            <button class="btn btn-success" id="status" data="{{$value->post_bid_id}}">
                                                <i class="fa fa-refresh"
                                                   aria-hidden="true"></i>
                                            </button>
                                        @else
                                            <button class="btn btn-danger" id="status" data="{{$value->post_bid_id}}">
                                                <i class="fa fa-refresh"
                                                   aria-hidden="true"></i>
                                            </button>
                                        @endif
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
@endsection
