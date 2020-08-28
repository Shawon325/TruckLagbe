<?php

namespace App\Http\Controllers;

use App\PostBid;
use Illuminate\Http\Request;
use App\Http\Requests\PostBidRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class PostBidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bid_data = PostBid::where("truck_driver_id", Auth::user()->id)->with("post")->get();
        return view('Backend.Truck.post_bid', ['bid_data' => $bid_data]);
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
    public function store(PostBidRequest $request)
    {
//        dd($request->all());
        $post_bid_model = new PostBid();
        $requestdata = $request->all();
        $requestdata = Arr::set($requestdata, "truck_driver_id", Auth::user()->id);
        $post_bid_model->fill($requestdata)->save();
        return response()->json($post_bid_model, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\PostBid $postBid
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post_bid_status = PostBid::findOrFail($id);
        if ($post_bid_status->status == 1) :
            $post_bid_status->update(["status" => 0]);
            $status = 201;
        else :
            $post_bid_status->update(["status" => 1]);
            $status = 200;
        endif;
        return response()->json($post_bid_status, $status);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\PostBid $postBid
     * @return \Illuminate\Http\Response
     */
    public function edit(PostBid $postBid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\PostBid $postBid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostBid $postBid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\PostBid $postBid
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostBid $postBid)
    {
        //
    }
}
