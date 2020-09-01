<table class="table dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
    <thead>
    <tr>
        <th>#</th>
        <th>Role Name</th>
        <th>Permission Name</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($role as $key => $value)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$value->name}}</td>
            <td>
                {{--                <pre>{{$value}}</pre>--}}
                @php $roles_permissions=array_column((collect($value)->toArray())['permissions'],'id');@endphp
                {{--                @php  print_r($roles_permissions) @endphp--}}
                @foreach($permission as $data)

                    @php $status=in_array($data['id'],$roles_permissions); @endphp
                    <input type="checkbox" disabled {{$status?'checked':''}}>
                    {{$data['name']}}
                @endforeach
            </td>
            <td>
                @can('Role Permission Edit')
                    <button class="btn btn-info edit" data="{{$value->id}}" data-toggle="modal"
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
        {{--        {{$role_permission->links()}}--}}
    </div>
</div>
