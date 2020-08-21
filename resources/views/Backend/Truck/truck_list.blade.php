@extends('Backend.layouts.backend_head')
@section('title', '|| Truck List')
@section('head', 'Truck List')
@section('head_name', 'Dashboard')
@section('sub_name', 'Truck List')
@section('content')
    <form id="district_update_form">
        <div id="imageModel" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Truck Image</h5>
                    </div>
                    <div class="panel-body">

                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row" id="blah"></div>
{{--                                            <input type="file"  name="n_service_img" id="id_service_image" />--}}
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

    <form id="truck_update_form">
        <div id="editModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">EDIT DISTRICT</h5>
                    </div>
                    <div class="panel-body">

                        <input type="hidden" class="form-control" name="truck_id" id="truck_id">

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Truck Number:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="truck_number" id="truck_number" placeholder="Truck Number">
                                <span class="text-danger" id="u_truck_number"></span>
                            </div>
                        </div>
                        <br><br>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Ton:</label>
                            <div class="col-lg-9">
                                <select name="ton" id="ton" class="form-control">
                                    <option selected disabled hidden>Choose one</option>
                                    @foreach($ton as $value)
                                        <option value="{{$value->ton_id}}">{{$value->ton_number}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger" id="ton"></span>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger" id="close3" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

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
    <script type="text/javascript" src="{{asset('backend_assets/js/truck.js')}}"></script>
@endsection
