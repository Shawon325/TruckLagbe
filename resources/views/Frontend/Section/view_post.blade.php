@extends('Frontend.Layouts.head')
@section('main_content')
    <div class="container">
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
                    <button class="btn btn-info edit" data="{{$view_post->post_id}}" data-toggle="modal"
                            data-target="#editModal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

@endsection
