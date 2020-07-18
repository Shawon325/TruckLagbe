@extends('Backend.layouts.backend_head')
@section('title', '|| Distract')
@section('head', 'Distract')
@section('head_name', 'Dashboard')
@section('sub_name', 'Distract')
@section('content')
    <button style="float: right" class="btn btn-info" data-toggle="modal" data-target="#add_division">Add new</button> 
    <form id="district_form">
        <div id="add_division" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">ADD DISTRICT</h5>
                    </div>
                    <div class="modal-body">
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Division Name:</label>
                                <div class="col-lg-9">
                                    <select name="division_name" class="form-control">
                                        <option selected disabled hidden>Choose one</option>
                                    @foreach($division as $value)
                                    <option value="{{$value->division_id}}">{{$value->division_name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div><br><br>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Distract Name:</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="district_name" placeholder="Distract Name">
                                </div>
                            </div>
                            <br><br>


                            <div class="form-group">
                                <label class="col-lg-3 control-label">Description:</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="description" placeholder="Description">
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

    <form id="district_update_form">
        <div id="editModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">EDIT DISTRICT</h5>
                    </div>
                    <div class="panel-body">
                            <div class="form-group">
                                <div class="col-lg-9">
                                    <input type="hidden" class="form-control" id="district_id" name="district_id">
                                </div>
                            </div>
                            <br><br>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Division Name:</label>
                                <div class="col-lg-9">
                                    <select name="division_name" class="form-control" id="division_name">
                                        <option selected disabled hidden>Choose one</option>
                                    @foreach($division as $value)
                                    <option value="{{$value->division_id}}">{{$value->division_name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div><br><br>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Distract Name:</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="district_name" name="district_name" placeholder="Distract Name">
                                </div>
                            </div>
                            <br><br>


                            <div class="form-group">
                                <label class="col-lg-3 control-label">Description:</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="description" name="description" placeholder="Description">
                                </div>
                            </div>
                            <br><br>
                        </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger" id="close2" data-dismiss="modal">Close</button>
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
                    <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i> View All Image</h6></div>
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
    <script type="text/javascript" src="{{asset('backend_assets/js/district.js')}}"></script>
@endsection
