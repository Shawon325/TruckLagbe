<?php
 
namespace App\Http\Controllers;

use App\Upzilla;
use App\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\AssignOp\Div;

class UpzillaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $upzilla = Upzilla::all();
        $district = District::active()->get();
        return view('Backend.Setting.Upzilla.upzilla', [
            'upzilla' => $upzilla,
            'district' => $district
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $district = District::active()->get();
        $upzilla = Upzilla::where(function ($upzilla) use ($request) {
            if ($request->search) {
                $upzilla->where('upzilla_name', 'LIKE', '%' . $request->search . '%');
            }
        })->paginate(10);
        return view('Backend.Setting.Upzilla.list', [
            'district' => $district,
            'upzilla' => $upzilla
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());Upzilla
        $upzilla_model = new Upzilla();
        $validation = Validator::make($request->all(), $upzilla_model->validation());
        if ($validation->fails()) {
            $status = 400;
            $response = [
                "status" => $status,
                "errors" => $validation->errors(),
            ];
        } else {
            $upzilla_model->fill($request->all())->save();
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
     * @param  \App\Upzilla  $upzilla
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $upzilla_status = Upzilla::findOrFail($id);
        if ($upzilla_status->status == 1) :
            $upzilla_status->update(["status" => 0]);
            $status = 201;
        else :
            $upzilla_status->update(["status" => 1]);
            $status = 200;
        endif;
        return response()->json($upzilla_status, $status);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Upzilla  $upzilla
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $upzilla_data = Upzilla::findOrFail($id);
        return response()->json($upzilla_data, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Upzilla  $upzilla
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
         // dd($request->all());
        $upzilla_model = Upzilla::findOrFail($request->upzilla_id);
        $validation = Validator::make($request->all(), $upzilla_model->validation());
        if ($validation->fails()) {
            $status = 400;
            $response = [
                "status" => $status,
                "errors" => $validation->errors(),
            ];
        } else {
            $upzilla_model->fill($request->all())->save();
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
     * @param  \App\Upzilla  $upzilla
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $upzilla = Upzilla::findOrFail($id)->delete();
        return response()->json($upzilla, 202);
    }
}
