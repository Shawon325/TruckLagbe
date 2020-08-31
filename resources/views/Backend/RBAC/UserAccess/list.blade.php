<table class="table dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
    <thead>
    <tr>
        <th class="text-center">SL</th>
        <th class="text-center">Email</th>
        <th class="text-center">Role</th>
        <th class="text-center">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $i=>$user)
        <tr>
            <td>{{++$i}}</td>
            <td>{{$user->email}}</td>
            <td style="text-transform:uppercase;">
                @if ($user->roles)
                    @foreach($user->roles as $role)
                        <b>{{$role->name}}</b>
                    @endforeach
                @else
                    Not Assigned
                @endif
            </td>
            <td>
                <button class="btn btn-primary edit" data-toggle="modal" data-target="#editUserAccess"
                        data="{{$user->id}}"
                ><i class="fa fa-edit"></i></button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
