<table class="table dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
    <thead>
    <tr>
        <th>#</th>
        <th>Ton Number</th>
        <th>Description</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($ton as $key => $value)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$value->ton_number}}</td>
            <td>{{$value->description}}</td>
            <td>
                @if ($value->status == 1)
                    <span class="text-success">Active</span>
                @else
                    <span class="text-danger">Inactive</span>
                @endif
            </td>
            <td>
                @can('Ton Delete')
                    <button class="btn btn-danger delete" data="{{$value->ton_id}}"><i class="fa fa-trash"
                                                                                       aria-hidden="true"></i></button>
                @endcan
                @if ($value->status == 1)
                    <button class="btn btn-success" id="status" data="{{$value->ton_id}}"><i class="fa fa-refresh"
                                                                                             aria-hidden="true"></i>
                    </button>
                @else
                    <button class="btn btn-primary" id="status" data="{{$value->ton_id}}"><i class="fa fa-refresh"
                                                                                             aria-hidden="true"></i>
                    </button>
                @endif
                @can('Ton Edit')
                    <button class="btn btn-info edit" data="{{$value->ton_id}}" data-toggle="modal"
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
        {{$ton->links()}}
    </div>
</div>
