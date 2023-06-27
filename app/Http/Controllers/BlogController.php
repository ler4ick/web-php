<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogModel;
use Illuminate\Support\Facades\Storage;

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

    public function delete(Request $request, $blogId) {
        $blog = BlogModel::query()->whereId($blogId)->first();

        if ($blog->image) {
            Storage::delete('public\blog_images\\'. $blog->image);
        }

        $blog->delete();

        return back()->with('success', 'Запись успешно удалена');
    }

    public function edit(Request $request, $blogId) {
        $blog = BlogModel::query()->whereId($blogId)->first();

        return view('blog-edit', compact('blog'));
    }

    public function update(Request $request, $blogId) {
        $request->validate([
            'title' => 'nullable',
            'image' => 'nullable|image|max:2048',
            'message' => 'nullable',
        ]);
        $blog = BlogModel::query()->whereId($blogId)->first();
        $image = null;


        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->getClientOriginalName();
            $imageName = preg_replace('/\s+/', '_', $imageName);
            $imageName = time() . '_' . $imageName;
            $request->file('image')->storeAs('public\blog_images', $imageName);
            $image = $imageName;

            if ($blog->image) {
                Storage::delete('public\blog_images\\'. $blog->image);
            }
        }

        $blog->update([
            'title' => $request->title,
            'image' => $image ? : $blog->image,
            'message' => $request->message,
        ]);

        return back()->with('success', 'Запись успешно обновлена');
    }
}
