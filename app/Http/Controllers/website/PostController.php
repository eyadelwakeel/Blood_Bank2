<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('website.subpages.posts', compact('posts'));
    }
    public function postDetails($id)
    {
        $post = Post::findOrFail($id);

        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->latest()
            ->take(6)
            ->get();

        return view('website.subpages.post-details', compact('post', 'relatedPosts'));
    }
}
