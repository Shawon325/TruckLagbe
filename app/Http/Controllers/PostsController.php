<?php

namespace App\Http\Controllers;

use App\Posts;
use App\Division;
use App\District;
use App\Upzilla;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

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

        return view('Backend.Post.Posts.add_posts',[
            'division' => $division,
            'district' => $district,
            'upzilla' => $upzilla,
        ]);
    }
     public function list(Request $request)
     {
         $posts = Posts::where(function ($posts) use ($request) {
             if ($request->search) {
                 $posts->where('post_id', 'LIKE', '%' . $request->search . '%');
             }
         })->paginate(10);
         return view('Backend.Post.Posts.list', [
             'posts' => $posts,
         ]);
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
         $posts_model = new Posts();

         $division1 = Division::where('division_id', $request->division_name1)->first();
         $district1 = District::where('district_id', $request->district_name1)->first();
         $upzilla1 = Upzilla::where('upzilla_id', $request->upzilla_name1)->first();

         $division2 = Division::where('division_id', $request->division_name2)->first();
         $district2 = District::where('district_id', $request->district_name2)->first();
         $upzilla2 = Upzilla::where('upzilla_id', $request->upzilla_name2)->first();

         $posts_model->post_pick_up_time = $request->post_pick_up_time;
         $posts_model->post_pick_up_address = $division1->division_name . "," . $district1->district_name . "," . $upzilla1->upzilla_name . "," . $request->home_address1;
         $posts_model->post_pick_drop_address = $division2->division_name . "," . $district2->district_name . "," . $upzilla2->upzilla_name . "," . $request->home_address2;
         $posts_model->accessory_weight = $request->accessory_weight . "kg";
         $posts_model->description = $request->description;
         $posts_model->save();

         return view('Backend.Post.Posts.posts_list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts_status = Posts::findOrFail($id);
        if ($posts_status->status == 1) :
            $posts_status->update(["status" => 0]);
            $status = 201;
        else :
            $posts_status->update(["status" => 1]);
            $status = 200;
        endif;
        return response()->json($posts_status, $status);
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
        $posts = Posts::findOrFail($id)->delete();
        return response()->json($posts, 202);
    }
}
