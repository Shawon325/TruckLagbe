@extends('Frontend.Layouts.head')
@section('main_content')
    <div class="container">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-10">Basic Info</div>
                    <div class="col-md-2">
                        <button class="btn btn-info"data="{{$view_post->post_id}}" data-toggle="modal" data-target="#bidModal"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Action</button>
                    </div>
                </div>
                <header></header><br>
                <div class="card border-success">
                  <div class="card-body ">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-4">Pick Up Address</div>
                                <div class="col-md-8">
                                    <img style="max-width: 2rem; max-height: 2rem; float: left;" src="{{asset('frontend_assets/assets/img/location-1.png')}}" class="rounded mx-auto d-block" alt="...">
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-4">Pick Down Address</div>
                                <div class="col-md-8">
                                    <img style="max-width: 2rem; max-height: 2rem; float: left;" src="{{asset('frontend_assets/assets/img/location-1.png')}}" class="rounded mx-auto d-block" alt="...">
                                
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-4">Pick Up Date</div>
                                <div class="col-md-8">{{$view_post->assign_date}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-4">Pick Up time</div>
                                <div class="col-md-8">{{$view_post->post_pick_up_time}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-4">Accessory Weight</div>
                                <div class="col-md-8">{{$view_post->accessory_weight}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-4">Budget</div>
                                <div class="col-md-8">{{$view_post->budget}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-4">Description</div>
                                <div class="col-md-8">{{$view_post->description}}</div>
                            </div>
                        </li>
                      

                    </ul>
                  </div>
                </div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <table class="table dataTable no-footer" id="DataTables_Table_0" role="grid"
               aria-describedby="DataTables_Table_0_info">
            <thead>
            <tr>
                <th>Pick Up Date</th>
                <th>Pick Up Time</th>
                <th>Pick Up Address</th>
                <th>Pick Drop Address</th>
                <th>Accessory Weight</th>
                <th>Description</th>
                <th>Budget</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <br>
            <tr>
                <td>{{$view_post->assign_date}}</td>
                <td>{{$view_post->post_pick_up_time}}</td>
                <td>{{$view_post->pick_up_address->division->division_name}}
                    ,{{$view_post->pick_up_address->district->district_name}}
                    ,{{$view_post->pick_up_address->upzilla->upzilla_name}}
                    ,{{$view_post->pick_up_address->home_address}}</td>
                <td>{{$view_post->pick_down_address->division->division_name}}
                    ,{{$view_post->pick_down_address->district->district_name}}
                    ,{{$view_post->pick_down_address->upzilla->upzilla_name}}
                    ,{{$view_post->pick_down_address->home_address}}</td>
                <td>{{$view_post->accessory_weight}}</td>
                <td>{{$view_post->description}}</td>
                <td>{{$view_post->budget}}</td>
                <td>
                    <button class="btn btn-info btn-sm bid" data="{{$view_post->post_id}}" data-toggle="modal"
                            data-target="#bidModal"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <form id="ton_form">
        <div id="bidModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><b>Bid</b></h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="panel-body">

                            <div class="form-group">
                                <label class="form-group">Truck Number:</label>
                                <input class="form-control" type="text" name="truck_number"
                                       placeholder="Enter truck number....">
                            </div>
                            <br>
                            <div class="form-group">
                                <label class="form-group">Bid Amount:</label>
                                <input class="form-control" type="number" name="bid_amount" value="0">
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-dark">Bid</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
