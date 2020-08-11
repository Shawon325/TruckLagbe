<?php

namespace App\Http\Controllers;

use App\PostBid;
use Illuminate\Http\Request;
use App\Http\Requests\PostBidRequest;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\AssignOp\Div;

class PostBidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(PostBidRequest $request)
    {
//        $post_bid_model = new PostBid();
//        $post_bid_model->fill($request->all())->save();
//        return response()->json($post_bid_model, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PostBid  $postBid
     * @return \Illuminate\Http\Response
     */
    public function show(PostBid $postBid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PostBid  $postBid
     * @return \Illuminate\Http\Response
     */
    public function edit(PostBid $postBid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PostBid  $postBid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostBid $postBid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PostBid  $postBid
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostBid $postBid)
    {
        //
    }
}
