<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogModel;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function update(Request $request) {
        $request->validate([
            'post_id' => 'required|numeric',
            'user_id' => 'required|numeric',
            'remove_image' => 'nullable|boolean',
            'title' => 'nullable',
            'image' => 'nullable|image|max:2048',
            'message' => 'nullable',
        ]);
        $blog = BlogModel::query()->whereId($request->post_id)->first();
        $image = null;

        if ($request->hasFile('image') and !!$request->file('image')) {
            $imageName = $request->file('image')->getClientOriginalName();
            $imageName = preg_replace('/\s+/', '_', $imageName);
            $imageName = time() . '_' . $imageName;
            $request->file('image')->storeAs('public\blog_images', $imageName);
            $image = Storage::url('blog_images/' . $imageName);

            if ($blog->image) {
                Storage::delete('public\blog_images\\'. $blog->image);
            }
        }

        if ($request->remove_image and $blog->image) {
            Storage::delete('public\blog_images\\'. $blog->image);
            $blog->image = null;
        }

        $blog->update([
            'title' => $request->title,
            'image' => $image ? $image : $blog->image,
            'message' => $request->message,
        ]);

        return response()->json([
            'data' => $blog
        ]);

    }
}
