<?php

namespace App\Http\Controllers;

use App\ton;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\AssignOp\Div;

class TonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['role_or_permission:Truck User|Ton View']);
    }

    public function index()
    {
        return view('Backend.Truck.Ton.ton');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $ton = ton::where(function ($ton) use ($request) {
            if ($request->search) {
                $ton->where('ton_number', 'LIKE', '%' . $request->search . '%');
            }
        })->paginate(10);
        return view('Backend.Truck.Ton.list', ['ton' => $ton]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ton_model = new ton();
        $validation = Validator::make($request->all(), $ton_model->validation());
        if ($validation->fails()) {
            $status = 400;
            $response = [
                "status" => $status,
                "errors" => $validation->errors(),
            ];
        } else {
            $ton_model->fill($request->all())->save();
            $status = 201;
            $response = [
                "status" => $status,
                "errors" => $validation->errors(),
            ];
        }
        return response()->json($response, $status);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\ton $ton
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ton_status = ton::findOrFail($id);
        if ($ton_status->status == 1) {
            $ton_status->update(["status" => 0]);
            $status = 201;
        } else {
            $ton_status->update(["status" => 1]);
            $status = 200;
        }
        return response()->json($ton_status, $status);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\ton $ton
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ton_data = ton::findOrFail($id);
        return response()->json($ton_data, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\ton $ton
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $ton_model = ton::findOrFail($request->ton_id);
        $validation = Validator::make($request->all(), $ton_model->validation());
        if ($validation->fails()) {
            $status = 400;
            $response = [
                "status" => $status,
                "errors" => $validation->errors(),
            ];
        } else {
            $ton_model->fill($request->all())->save();
            $status = 201;
            $response = [
                "status" => $status,
                "errors" => $validation->errors(),
            ];
        }
        return response()->json($response, $status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\ton $ton
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ton = ton::findOrFail($id)->delete();
        return response()->json($ton, 202);

    }
}
