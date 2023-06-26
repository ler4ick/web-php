<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogModel;

class BlogController extends Controller
{
    public function index()
    {
        $blogPosts = BlogModel::orderBy('created_at', 'desc')->paginate(5);
        return view('blog', compact('blogPosts'));
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image|mimes:jpg|max:2048',
            'message' => 'required',
        ]);

        $posts = new BlogModel();
        $posts->title = $request->title;
        $posts->message = $request->message;

        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->getClientOriginalName();
            $imageName = preg_replace('/\s+/', '_', $imageName);
            $imageName = time() . '_' . $imageName;
            $request->file('image')->storeAs('public\blog_images', $imageName);
            $posts->image = $imageName;
        }
        $posts->save();

        return back()->with('success', 'Your data have been submitted successfully.');
    }
}
