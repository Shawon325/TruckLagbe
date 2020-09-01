<table class="table dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
    <thead>
    <tr>
        <th>#</th>
        <th>Permission Name</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($permission as $key => $value)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$value->name}}</td>
            <td>
                @can('Permission Delete')
                    <button class="btn btn-danger delete" data="{{$value->id}}"><i
                            class="fa fa-trash-o" aria-hidden="true"></i></button>
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
        {{$permission->links()}}
    </div>
</div>
