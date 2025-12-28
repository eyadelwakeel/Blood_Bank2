<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Api\UpdateUserDataRequest;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use app\Models\User;
use Illuminate\Support\Facades\Auth;


class UserDataController extends Controller
{
    //
    use ApiResponse;
    public function show(Request $request)
    {
        // $user = $request->user();
        $user = $request->user()->load(['city', 'bloodTypeUsers']);
        return $this->api_data_response($user);

    }
    public function update(UpdateUserDataRequest $request)
{
    $user = $request->user();
    $data = $request->validated();

    if ($request->has('password')) {
        $data['password'] = Hash::make($request->password);
    }


    $user->update($data);

    return $this->api_success_massage(
        'Your data has been updated',
        $user->fresh()
    );
}
    public function toggleFavPost(Request $request)
    {

        

        $user = $request->user();
        $userId = Auth::id();
        $postId = $request->input('post_id');

        if ($user->favPosts()->where('post_id', $postId)->exists()) {
            // If the post is already a favorite, remove it
            $user->favPosts()->detach($postId);
            $message = 'Post removed from favorites.';
        } else {
            // If the post is not a favorite, add it
            $user->favPosts()->attach($postId);
            $message = 'Post added to favorites.';
        }

        return $this->api_success_massage($message);
    }

}
