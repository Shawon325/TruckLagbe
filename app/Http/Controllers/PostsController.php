<?php

namespace App\Http\Controllers;

use App\Posts;
use App\Division;
use App\District;
use App\Upzilla;
use App\Truck;
use App\PostPickUpModel;
use App\PostPickDownModel;
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
        $truck = Truck::all();
        return view('Backend.Post.Posts.posts_list', [
            'truck' => $truck,
        ]);
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

        return view('Backend.Post.Posts.add_posts', [
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
        })->with("pick_up_address.division")
            ->with("pick_up_address.district")
            ->with("pick_up_address.upzilla")
            ->with("pick_down_address.division")
            ->with("pick_down_address.district")
            ->with("pick_down_address.upzilla")
            ->paginate(10);
        return view('Backend.Post.Posts.list', [
            'posts' => $posts,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $posts_model = new Posts();

        $posts_model->post_pick_up_time = $request->post_pick_up_time . ' ' . $request->post_time_period;
        $posts_model->accessory_weight = $request->accessory_weight;
        $posts_model->description = $request->description;
        $posts_model->save();

        $post_pick_up_model = new PostPickUpModel();
        $post_pick_up_model->post_id = $posts_model->post_id;
        $post_pick_up_model->division_id = $request->division_name1;
        $post_pick_up_model->district_id = $request->district_name1;
        $post_pick_up_model->upzilla_id = $request->upzilla_name1;
        $post_pick_up_model->home_address = $request->home_address1;
        $post_pick_up_model->save();

        $post_pick_down_model = new PostPickDownModel();
        $post_pick_down_model->post_id = $posts_model->post_id;
        $post_pick_down_model->division_id = $request->division_name2;
        $post_pick_down_model->district_id = $request->district_name2;
        $post_pick_down_model->upzilla_id = $request->upzilla_name2;
        $post_pick_down_model->home_address = $request->home_address2;
        $post_pick_down_model->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Posts $posts
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
     * @param \App\Posts $posts
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $posts)
    {
        //
    }

    public function bidAdd($post_id)
    {
        $data = Posts::findOrFail($post_id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Posts $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posts $posts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Posts $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PostPickUpModel::where("post_id", $id)->delete();
        PostPickDownModel::where("post_id", $id)->delete();
        $posts = Posts::findOrFail($id)->delete();
        return response()->json($posts, 202);
    }
}
