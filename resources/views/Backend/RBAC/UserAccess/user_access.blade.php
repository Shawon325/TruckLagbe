@extends('Backend.layouts.backend_head')
@section('title', '|| User Access')
@section('head', 'User Access')
@section('head_name', 'Dashboard')
@section('sub_name', 'User Access')
@section('content')
    <form id="user_access_form">
        <div id="editUserAccess" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Add User Role</h5>
                    </div>
                    <div class="modal-body">
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <div style="border: 1px solid;background: rgb(46, 93, 128);color: white;">
                                        <p style="margin-left: 2%;margin-top: 1%;font-size: 14px;font-weight: 800;text-align: center;"
                                           id="user"></p>
                                    </div>
                                    <input type="hidden" id="user_id">
                                </div>
                            </div>
                            <br><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="border: 1px solid;background: #2596f3;color: white;">
                                        <p style="margin-left: 2%;margin-top: 1%;font-size: 14px;font-weight: 800;text-align: center;">
                                            Role
                                        </p>
                                    </div>
                                    <select style="font-weight: bold;" class="form-control" id="role_id" name="role_id">
                                        <option value="" selected hidden>--Select One--</option>
                                        @foreach($roles as $key => $value)
                                            <option style="font-weight: bold;"
                                                    value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" id="old_role" name="old_role">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="tabbable page-tabs">
        <div class="tab-content">
            <div class="tab-pane active fade in" id="inside">
                <div class="panel panel-default">
                    <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i> View All User Access
                        </h6>
                    </div>
                    <div class="datatable">
                        <div id="DataTables_Table_0_filter" class="dataTables_filter">
                            <label><span>Filter:</span>
                                <input type="search" class="search" aria-controls="DataTables_Table_0"
                                       placeholder="Type to filter...">
                            </label>
                        </div>
                        <div class="dataTables_length" id="DataTables_Table_0_length">
                            <label><span>Show:</span>
                                <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0"
                                        class="select2-offscreen" tabindex="-1" title="">
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
    <br><br>
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('backend_assets/js/user_access.js')}}"></script>
@endsection
