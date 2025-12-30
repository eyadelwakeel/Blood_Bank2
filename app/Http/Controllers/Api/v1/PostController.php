<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    use ApiResponse;
    //
    // public function index(Request $request){

    //     $posts = Post::where(function($query) use($request){
    //         if($request->search){
    //             $query->where('title', 'like','%'.$request->search.'%');
    //         }
    //         if($request->category_id){
    //             $query->where('category_id', $request->category_id);
    //         }
    //     })->paginate();

    //     return $posts;
    // }

    public function index(Request $request)
{

    $posts = Post::query()
    ->when($request->filled('search'), function ($query) use ($request) {
        $query->where('title', 'like', '%' . $request->search . '%');
    })
    ->when($request->filled('category_id'), function ($query) use ($request) {
        $query->where('category_id', $request->category_id);
    })
    ->paginate();
    return $this->api_success_massage($posts);
}


 public function toggleFavPost(Request $request)
{
    $user = $request->user();
    $postId = $request->input('post_id');

    if ($user->posts()->where('post_id', $postId)->exists()) {
        $user->posts()->detach($postId);
        $message = 'Post removed from favorites.';
    } else {
        $user->posts()->attach($postId);
        $message = 'Post added to favorites.';
    }

    return $this->api_success_massage($message);
}
}

