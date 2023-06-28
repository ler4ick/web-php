<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BlogComment;
use App\Models\BlogModel;
use App\Models\User;
use Illuminate\Http\Request;

class BlogCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|numeric',
            'user_id' => 'required|numeric',
            'text' => 'required|string',
        ]);

        BlogComment::create([
            "blog_model_id" => $request->post_id,
            "text" => $request->text,
            "user_id" => $request->user_id,
        ]);

        return response()->json([
            'data' => BlogModel::query()->whereId($request->post_id)->first()->comments()->orderBy('created_at', 'desc')->with('user')->get()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogComment $blogComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogComment $blogComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogComment $blogComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogComment $blogComment)
    {
        //
    }
}
