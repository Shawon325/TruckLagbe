<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Frontend.pages.home");
    }

    public function get_post()
    {
        $post = Posts::where("status", 1)->limit(6)->get();
        return response()->json($post, 201);
    }

    public function all_post()
    {
        $post = Posts::where("status", 1)->get();
        return view("Frontend.Section.post", ["post" => $post]);
    }

    public function view_post($id)
    {
        $view_post = Posts::where("post_id", $id)->where("status", 1)
            ->with("pick_up_address.division")
            ->with("pick_up_address.district")
            ->with("pick_up_address.upzilla")
            ->with("pick_down_address.division")
            ->with("pick_down_address.district")
            ->with("pick_down_address.upzilla")
            ->first();
        return view("Frontend.Section.view_post", ["view_post" => $view_post]);
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
        //
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
        //
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
