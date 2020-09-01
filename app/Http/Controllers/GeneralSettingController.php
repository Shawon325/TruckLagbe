<?php

namespace App\Http\Controllers;

use App\GeneralSetting;
use App\Http\Requests\GeneralSettingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class GeneralSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $general_setting = GeneralSetting::first();
        return view('Backend.GeneralSetting.general_setting', ['general_setting' => $general_setting]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\GeneralSetting $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function show(GeneralSetting $generalSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\GeneralSetting $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(GeneralSetting $generalSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\GeneralSetting $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function update(GeneralSettingRequest $request, $id)
    {
        // dd($request->all());
        $general_setting = GeneralSetting::findOrFail($id);
        $requested_data = $request->all();
        if ($request->hasFile('image')) {
//            if (Auth::user()->user_img)
//            {
//                unlink(public_path('images/user/').Auth::user()->user_img);
//            }
            $ext = $request->file('image')->getClientOriginalExtension();
            $path = 'backend_assets/images/general_setting/';
            $img_name = time() . '.' . $ext;
            $full_name = $path . $img_name;
            $request->file('image')->move($path, $img_name);
            $requested_data = Arr::set($requested_data, "logo", $full_name);
        }
        $general_setting->fill($requested_data)->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\GeneralSetting $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(GeneralSetting $generalSetting)
    {
        //
    }
}
