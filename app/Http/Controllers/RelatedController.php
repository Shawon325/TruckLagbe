<?php

namespace App\Http\Controllers;

use App\District;
use App\Division;
use App\Upzilla;
use Illuminate\Http\Request;

class RelatedController extends Controller
{
    public function getDivision()
    {
        $get_division = Division::get();
        return response()->json($get_division, 200);
    }

    public function getDistrict($division_id)
    {
        $district = District::where('division_name', $division_id)->get();
        return response()->json($district, 200);
    }

    public function getUpzilla($district_id)
    {
        $upzilla = Upzilla::where('district_name', $district_id)->get();
        return response()->json($upzilla, 200);
    }
}
