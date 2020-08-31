<?php

namespace App\Http\Controllers;

use App\RoleHasPermission;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleHasPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::all();
        $permission = Permission::all();
        return view('Backend.RBAC.RolePermission.role_has_permission', [
            'role' => $role,
            'permission' => $permission,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::with('permissions')->get();
        $permission = Permission::get()->toArray();
        return view('Backend.RBAC.RolePermission.list', [
            'role' => $role,
            'permission' => $permission
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        foreach ($request->permission_id as $key => $value) {
            $data[] = [
                "permission_id" => $request->permission_id[$key],
                "role_id" => $request->role_id,
            ];
        }
        $role_permission = RoleHasPermission::insert($data);

        return response()->json($role_permission, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['role_permissions'] = Role::with('permissions')->whereId($id)->get()->toArray();
        $data['permissions'] = Permission::all();
        return response()->json($data);

//        print_r($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        RoleHasPermission::where("role_id", $id)->delete();
        foreach ($request->permission_id as $key => $value) {
            $data[] = [
                "permission_id" => $request->permission_id[$key],
                "role_id" => $id,
            ];
        }
        RoleHasPermission::insert($data);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
