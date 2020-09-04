<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use File;
use DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Backend.Profile.profile');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required',
            'gender' => 'required',
            'contact'=> 'required',
            'image'  => 'mimes:png,jpg,jpeg',
        ]);
        if ($request->hasFile('image')) {
            if ($request->old_img!='') {
                unlink($request->old_img);
            }
            $image_type = $request->file('image')->getClientOriginalExtension();
            $path = "backend_assets/images/BackendImg/User/";
            $name = 'user_'.time().".".$image_type;
            $image = $request->file('image')->move($path, $name);

            $data = [
                'name'   => $request->name,
                'gender' => $request->gender,
                'contact'=> $request->contact,
                'image'  => $image
            ];
        } else {
            $data = [
                'name'   => $request->name,
                'gender' => $request->gender,
                'contact'=> $request->contact
            ];
        }

        User::where('id', Auth::user()->id)->update($data);
        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
