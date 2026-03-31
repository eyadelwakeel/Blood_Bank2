<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    //
    public function index()
    {
        $posts = Post::latest()->take(9)->get();
        $settings = Setting::first();

        return view('website.home', compact('posts', 'settings'));
    }
}
