<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function posts($id)
    {
        $post = Post::findOrFail($id);
        return view('website.subpages.post-details', compact('post'));
    }
}
