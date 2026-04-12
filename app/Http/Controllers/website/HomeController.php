<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    //
    public function index()
    {
        // $posts = Post::latest()->take(9)->get();
        $posts = Post::all()->take(9);
        $settings = Setting::first();

        return view('website.home', compact('posts', 'settings'));
    }
}
