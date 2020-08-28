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
@section('script')
    <script type="text/javascript" src="{{asset('backend_assets/js/posts.js')}}"></script>
@endsection
