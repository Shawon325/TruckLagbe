@extends('Backend.layouts.backend_head')
@section('head', 'Ton')
@section('head_name', 'Dashboard')
@section('sub_name', 'Ton')
@section('content')
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
                                <select name="division_name" class="form-control" id="e_division_name">
                                    <option selected disabled hidden>Choose one</option>
                                </select>
                                <span class="text-danger" id="u_division_name"></span>
                            </div>
                        </div><br><br>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Distract Name:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" id="e_district_name" name="district_name" placeholder="Distract Name">
                                <span class="text-danger" id="u_district_name"></span>
                            </div>
                        </div>
                        <br><br>


                        <div class="form-group">
                            <label class="col-lg-3 control-label">Description:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" id="e_description" name="description" placeholder="Description">
                                <span class="text-danger" id="u_description"></span>
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
                    <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i> View All Truck</h6></div>
                    <div class="datatable">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Truck Number</th>
                                    <th>Ton</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($truck as $key => $value)
                                <br>
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$value->truck_number}}</td>
                                    <td>{{$value->truck_ton->ton_number}}</td>
                                    <td>{{$value->address}}</td>
                                    <td>
                                        @if ($value->status == 1)
                                            <span class="text-success">Active</span>
                                        @else
                                            <span class="text-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-danger delete" data="{{$value->truck_id}}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        @if ($value->status === 1)
                                            <button class="btn btn-success" id="status" data="{{$value->truck_id}}"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                                        @else
                                            <button class="btn btn-primary" id="status" data="{{$value->truck_id}}"> <i class="fa fa-refresh" aria-hidden="true"></i></button>
                                        @endif
                                        <button class="btn btn-info edit" data="{{$value->truck_id}}" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        @if ($value->has_image === 1)
                                            <button class="btn btn-primary" data="{{$value->truck_id}}" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil" aria-hidden="true"></i></button>
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
    <script type="text/javascript" src="{{asset('backend_assets/js/truck.js')}}"></script>
@endsection
