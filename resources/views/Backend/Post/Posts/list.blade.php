<table class="table dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
    <thead>
    <tr>
        <th>#</th>
        <th>Pick Up Date</th>
        <th>Pick Up Time</th>
        <th>Pick Up Address</th>
        <th>Pick Drop Address</th>
        <th>Accessory Weight</th>
        <th>Description</th>
        <th>Budget</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($posts as $key => $value)
        <br>
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$value->assign_date}}</td>
            <td>{{$value->post_pick_up_time}}</td>
            <td>{{$value->pick_up_address->division->division_name}}
                ,{{$value->pick_up_address->district->district_name}},{{$value->pick_up_address->upzilla->upzilla_name}}
                ,{{$value->pick_up_address->home_address}}</td>
            <td>{{$value->pick_down_address->division->division_name}}
                ,{{$value->pick_down_address->district->district_name}}
                ,{{$value->pick_down_address->upzilla->upzilla_name}},{{$value->pick_down_address->home_address}}</td>
            <td>{{$value->accessory_weight}}</td>
            <td>{{$value->description}}</td>
            <td>{{$value->budget}}</td>
            <td>
                @if ($value->status == 1)
                    <span class="text-success">Active</span>
                @else
                    <span class="text-danger">Inactive</span>
                @endif
            </td>
            <td>
                @can('Post Delete')
                    <button class="btn btn-danger delete" data="{{$value->post_id}}"><i class="fa fa-trash"
                                                                                        aria-hidden="true"></i></button>
                @endcan
                @if ($value->status === 1)
                    <button class="btn btn-success" id="status" data="{{$value->post_id}}"><i class="fa fa-refresh"
                                                                                              aria-hidden="true"></i>
                    </button>
                @else
                    <button class="btn btn-primary" id="status" data="{{$value->post_id}}"><i class="fa fa-refresh"
                                                                                              aria-hidden="true"></i>
                    </button>
                @endif
                @can('Post Edit')
                    <button class="btn btn-info edit" data="{{$value->post_id}}" data-toggle="modal"
                            data-target="#editModal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                @endcan
                @can('Show Bid')
                    <a href="{{url('admin/posts/bidShow/'. $value->post_id)}}">
                        <button class="btn btn-info edit"><i class="fa fa-eye" aria-hidden="true"></i></button>
                    </a>
                @endcan
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="datatable-footer">
    <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 2 of 2
        entries
    </div>
    <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_0_paginate">
        {{$posts->links()}}
    </div>
</div>
