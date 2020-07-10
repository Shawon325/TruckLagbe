@extends('Backend.layouts.backend_head')
@section('head_name', 'Dashboard')
@section('content')
    <button style="float: right" class="btn btn-info" data-toggle="modal" data-target="#add_division">Add new</button>
    <form id="division_form">
        <div id="add_division" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">ADD DIVISION</h5>
                    </div>
                    <div class="modal-body">
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Division Name:</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="division_name" placeholder="Division Name">
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

    <form id="division_update_form">
        <div id="editModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Edit DIVISION</h5>
                    </div>
                    <div class="modal-body">
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-lg-9">
                                    <input type="hidden" class="form-control" id="division_id" name="division_id">
                                </div>
                            </div>
                            <br><br>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Division Name:</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="division_name" name="division_name" placeholder="Division Name">
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
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Division Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($division as $key => $value)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$value->division_name}}</td>
                                    <td>{{$value->description}}</td>
                                    <td>
                                        @if ($value->status == 1)
                                            <span class="text-success">Active</span>
                                        @else
                                            <span class="text-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-danger delete" data="{{$value->division_id}}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        @if ($value->status == 1)
                                            <button class="btn btn-success" id="status" data="{{$value->division_id}}"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                                        @else
                                            <button class="btn btn-primary" id="status" data="{{$value->division_id}}"> <i class="fa fa-refresh" aria-hidden="true"></i></button>
                                        @endif
                                        <button class="btn btn-info edit" data="{{$value->division_id}}" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
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
    <script type="text/javascript" src="{{asset('backend_assets/js/division.js')}}"></script>
@endsection
