<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Api\UpdateUserDataRequest;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use app\Models\User;

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

}
