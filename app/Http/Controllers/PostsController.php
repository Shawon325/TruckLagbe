<?php

namespace App\Http\Controllers;

use App\Posts;
use App\Division;
use App\District;
use App\Upzilla;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Backend.Post.Posts.posts_list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $division = Division::all();
        $district = District::all();
        $upzilla = Upzilla::all();

        return view('Backend.Post.add_post',[
            'division' => $division,
            'district' => $district,
            'upzilla' => $upzilla,
        ]);
    }
    // public function list(Request $request)
    // {
    //     $posts = Posts::where(function ($posts) use ($request) {
    //         if ($request->search) {
    //             $posts->where('post_id', 'LIKE', '%' . $request->search . '%');
    //         }
    //     })->paginate(10);
    //     return view('Backend.Post.Posts.list', [
    //         'posts' => $posts,
    //     ]);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $division = Division::where('division_id', $request->division_name)->first();
        // $district = District::where('district_id', $request->district_name)->first();
        // $upzilla = Upzilla::where('upzilla_id', $request->upzilla_name)->first();

        // $posts_moddel = new Posts();
        // $posts_moddel->post_pick_up_time = $request->post_pick_up_time;
        // $posts_moddel->post_pick_up_address = $division->division_name . "," . $district->district_name . "," . $upzilla->upzilla_name . "," . $request->post_pick_up_address;
        // $posts_moddel->post_pick_drop_address = $division->division_name . "," . $district->district_name . "," . $upzilla->upzilla_name . "," . $request->post_pick_drop_address;
        // $posts_moddel->accessory_weight = $request->accessory_weight;
        // $posts_moddel->description = $request->description;
        // $posts_moddel->save();

        // return view('Backend.Post.Posts.posts_list');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $posts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $posts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posts $posts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
