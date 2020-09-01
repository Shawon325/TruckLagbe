@extends('Backend.layouts.backend_head')
@section('title', '|| Role Has Permission')
@section('head', 'Role Has Permission')
@section('head_name', 'Dashboard')
@section('sub_name', 'Role Has Permission')
@section('content')
    @can('Role Permission Add')
        <button style="float: right" class="btn btn-info" data-toggle="modal" data-target="#add_ton">Add New Role
        </button>
    @endcan
    <form id="role_permission">
        <div id="add_ton" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Role Permission</h5>
                    </div>
                    <div class="modal-body">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="border: 1px solid;background: rgb(46, 93, 128);color: white;">
                                        <p style="margin-left: 2%;margin-top: 1%;font-size: 14px;font-weight: 800;text-align: center;">
                                            Role
                                        </p>

                                    </div>
                                    <select style="font-weight: bold;" class="form-control" name="role_id">
                                        <option value="" selected hidden>--Select One--</option>
                                        @foreach($role as $key => $value)
                                            <option style="font-weight: bold;"
                                                    value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="border: 1px solid;background: #2596f3;color: white;">
                                        <p style="margin-left: 2%;margin-top: 1%;font-size: 14px;font-weight: 800;">
                                            MODULE'S
                                            PERMISSION</p>
                                    </div>
                                    <table class="table datatable-pagination">
                                        <thead>
                                        <tr>
                                            <th>Module</th>
                                            <th>Module Permission</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($permission as $key => $value)
                                            <tr>
                                                <td style="font-weight: bold;">
                                                    {{ $value->name }}
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission_id[]"
                                                           value="{{ $value->id }}">
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
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

    <form id="edit_role_permission" method="post">
        @csrf
        @method("PUT")
        <div id="editModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Role Permission Edit</h5>
                    </div>
                    <div class="modal-body">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="border: 1px solid;background: rgb(46, 93, 128);color: white;">
                                        <p style="margin-left: 2%;margin-top: 1%;font-size: 14px;font-weight: 800;text-align: center;"
                                           id="role_name"></p>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="border: 1px solid;background: #2596f3;color: white;">
                                        <p style="margin-left: 2%;margin-top: 1%;font-size: 14px;font-weight: 800;">
                                            MODULE'S
                                            PERMISSION</p>
                                    </div>
                                    <table class="table datatable-pagination">
                                        <thead>
                                        <tr>
                                            <th>Module</th>
                                            <th>Module Permission</th>
                                        </tr>
                                        </thead>
                                        <tbody id="permission_box">

                                        </tbody>
                                    </table>
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
    <br><br><br>

    <div class="tabbable page-tabs">
        <div class="tab-content">
            <div class="tab-pane active fade in" id="inside">
                <div class="panel panel-default">
                    <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i> View All Role
                            Permission</h6>
                    </div>
                    <div class="datatable">
                        <div id="data_lists"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('backend_assets/js/role_permission.js')}}"></script>
@endsection
