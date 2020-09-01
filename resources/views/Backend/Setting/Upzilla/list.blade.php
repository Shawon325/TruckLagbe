<table class="table dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
    <thead>
    <tr>
        <th>#</th>
        <th>Distract Name</th>
        <th>Upzilla Name</th>
        <th>Description</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($upzilla as $key => $value)
        <tr>
            <td>{{$key+1}}</td>
            <td>
                @php $district_data = collect($district)->where('district_id', $value->district_name)->first() @endphp
                {{$district_data->district_name}}
            </td>
            <td>{{$value->upzilla_name}}</td>
            <td>{{$value->description}}</td>
            <td>
                @if ($value->status == 1)
                    <span class="text-success">Active</span>
                @else
                    <span class="text-danger">Inactive</span>
                @endif
            </td>
            <td>
                @can('Upzilla Delete')
                    <button class="btn btn-danger delete" data="{{$value->upzilla_id}}"><i class="fa fa-trash"
                                                                                           aria-hidden="true"></i>
                    </button>
                @endcan
                @if ($value->status == 1)
                    <button class="btn btn-success" id="status" data="{{$value->upzilla_id}}"><i class="fa fa-refresh"
                                                                                                 aria-hidden="true"></i>
                    </button>
                @else
                    <button class="btn btn-primary" id="status" data="{{$value->upzilla_id}}"><i class="fa fa-refresh"
                                                                                                 aria-hidden="true"></i>
                    </button>
                @endif
                @can('Upzilla Edit')
                    <button class="btn btn-info edit" data="{{$value->upzilla_id}}" data-toggle="modal"
                            data-target="#editModal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
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
        {{$upzilla->links()}}
    </div>
</div>
