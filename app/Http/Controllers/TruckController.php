<?php

namespace App\Http\Controllers;

use App\Http\Requests\TruckRequest;
use App\ton;
use App\Truck;
use App\TruckImages;
use App\Division;
use App\District;
use App\Upzilla;
use Image;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\TruckCollection;
use Illuminate\Http\Request;

class TruckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $truck = Truck::orderBy("truck_id", "desc")->with("truck_ton")->get();
        $ton = ton::all();
        return view('Backend.Truck.truck_list', ['ton' => $ton]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $division = Division::all();
        $ton = ton::all();
        return view('Backend.Truck.add_truck', [
            'division' => $division,
            'ton' => $ton
        ]);
    }

    public function division($division_id)
    {
        $district = District::where('division_name', $division_id)->get();
        return TruckCollection::collection($district);
    }

    public function district($district_id)
    {
        $upzilla = Upzilla::where('district_name', $district_id)->get();
        return TruckCollection::collection($upzilla);
    }

    public function truck_list(Request $request)
    {
        $truck = Truck::search($request->search)->with("truck_ton")->paginate(10);
        return view('Backend.Truck.list', [
            'truck' => $truck,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TruckRequest $request)
    {
        DB::beginTransaction();
        $division = Division::where('division_id', $request->division_name)->first();
        $district = District::where('district_id', $request->district_name)->first();
        $upzilla = Upzilla::where('upzilla_id', $request->upzilla_name)->first();

        $truck_model = new Truck();
        $truck_model->truck_number = $request->truck_number;
        $truck_model->ton = $request->ton;
        $truck_model->address = $division->division_name . "," . $district->district_name . "." . $upzilla->upzilla_name . "," . $request->home_address;
        $truck_model->has_image = $request->images != '' ? 1 : 0;
        $truck_model->save();

        if ($request->images) {
            foreach ($request->images as $key => $image_value) {
                $image_type = $image_value->getClientOriginalExtension();
                $path = "backend_assets/images/TruckImage/";
                $name = 'truck_image_' . (time() + $key) . "." . $image_type;
                $full_path = $path . $name;
                $image_upload = Image::make($image_value)->resize(300, 300);
                $image_upload->save($full_path);
                $truck_image = new TruckImages();
                $truck_image->truck_id = $truck_model->truck_id;
                $truck_image->images = $full_path;
                $truck_image->save();
            }
        }
        DB::commit();
//        return view('Backend.Truck.truck_list');
        return redirect('/admin/truck');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Truck $truck
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $truck_status = Truck::findOrFail($id);
        if ($truck_status->status == 1) :
            $truck_status->update(["status" => 0]);
            $status = 201;
        else :
            $truck_status->update(["status" => 1]);
            $status = 200;
        endif;
        return response()->json($truck_status, $status);
    }

    public function image($id)
    {
        $truck_images = TruckImages::where("truck_id", $id)->get();
        return TruckCollection::collection($truck_images);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Truck $truck
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $truck_data = Truck::findOrFail($id);
        return response()->json($truck_data, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Truck $truck
     * @return \Illuminate\Http\Response
     */
    public function update(TruckRequest $request, $id)
    {
        $truck_model = Truck::findOrFail($id);
        $truck_model->fill($request->all())->save();
        $status = 201;
        $response = [
            "status" => $status,
            "data" => $truck_model,
        ];
        return response()->json($response, $status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Truck $truck
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $truck = Truck::findOrFail($id)->delete();
        return response()->json($truck, 202);
    }
}
