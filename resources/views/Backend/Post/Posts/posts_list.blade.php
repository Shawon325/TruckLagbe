@extends('Backend.layouts.backend_head') 
@section('title', '|| Posts List')
@section('head', 'Posts List')
@section('head_name', 'Dashboard')
@section('sub_name', 'Posts List')
@section('content')
    <form id="district_update_form">
        <div id="imageModel" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">EDIT Posts</h5>
                    </div>
                    <div class="panel-body">



                    </div>
                </div>
            </div>
        </div>
    </form>

<!-- Bid Posts -->
    <form id="bid_add_form">
        <div id="bidAdd" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Add Bid Posts</h5>
                    </div>
                    <div class="modal-body">
                        <div class="panel-body">
                            <input type="hidden" class="form-control" value="" id="post_id" name="post_id">
                            <input type="hidden" class="form-control" id="truck_driver_id" name="truck_driver_id">
                            <div class="form-group">
                                <label class="col-lg-3 control-label">truck driver id</label>
                                <div class="col-lg-9">
                                    <select name="truck_driver_id" class="form-control">
                                        <option selected disabled hidden>Choose one</option>
                                    
                                    </select>
                                    <span class="text-danger" id="division_name"></span>
                                </div>
                            </div><br><br>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">truck Number</label>
                                <div class="col-lg-9">
                                    <select name="truck_number" class="form-control">
                                        <option selected disabled hidden>Choose one</option> 
                                        @foreach($truck as $value)
                                    <option value="{{$value->truck_number}}">{{$value->truck_number}}</option>
                                    @endforeach 
                                    </select>
                                    <span class="text-danger" id="truck_number"></span>
                                </div>
                            </div><br><br>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Bid Amount:</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="bid_amount" placeholder="Amount of Bid">
                                    <span class="text-danger" id="description"></span>
                                </div>
                            </div>
                            <br><br>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <br><br><br>

    <div class="tabbable page-tabs">
        <div class="tab-content">
            <div class="tab-pane active fade in" id="inside">
                <div class="panel panel-default">
                    <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i> View All Truck</h6></div>
                    <div class="datatable">
                        <div id="DataTables_Table_0_filter" class="dataTables_filter">
                            <label><span>Filter:</span>
                                <input type="search" class="search" aria-controls="DataTables_Table_0" placeholder="Type to filter...">
                            </label>
                        </div>
                        <div class="dataTables_length" id="DataTables_Table_0_length">
                            <label><span>Show:</span>
                                <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="select2-offscreen" tabindex="-1" title="">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </label>
                        </div>
                        <div id="data_lists"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('backend_assets/js/posts.js')}}"></script>
@endsection
