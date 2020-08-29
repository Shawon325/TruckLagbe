@extends('Backend.layouts.backend_head')
@section('title', '|| Role Has Permission')
@section('head', 'Role Has Permission')
@section('head_name', 'Dashboard')
@section('sub_name', 'Role Has Permission')
@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div style="border: 1px solid;background: rgb(46, 93, 128);color: white;">
                <p style="margin-left: 2%;margin-top: 1%;font-size: 14px;font-weight: 800;text-align: center;">
                    {{ $role->name }}</p>
            </div>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div style="border: 1px solid;background: #2596f3;color: white;">
                <p style="margin-left: 2%;margin-top: 1%;font-size: 14px;font-weight: 800;">MODULE'S
                    PERMISSION</p>
            </div>
            <table class="table datatable-pagination">
                <thead>
                <tr>
                    <th>Module</th>
                    <th>Module Permission</th>
                </tr>
                </thead>
                <tbody>
                @foreach($permission as $key => $value)
                    <tr>
                        <td style="font-weight: bold;">
                            {{ $value->name }}
                        </td>
                        <td>
                            <input type="checkbox" value="={{ $value->id }}">
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('backend_assets/js/role.js')}}"></script>
@endsection
