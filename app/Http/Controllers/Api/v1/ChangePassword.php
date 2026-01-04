<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ChangePassword as ApiChangePassword;
use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Hash;

class ChangePassword extends Controller
{
    use ApiResponse;
    //
    public function changePassword(ApiChangePassword $request)
    {
        $user = User::where('phone', $request['phone'])
        ->where('verification_code',(string) $request['verification_code'])
        ->first();
        if (!$user) {
            return $this->api_error_massage('User not found');
        }
        if ($user->verification_code_expires_at < now()) {
            return response()->json([
                'message' => 'Verification code expired'
            ], 422);
        }
        $user->password = Hash::make($request['password']);
        $user->verification_code = null;
        $user->verification_code_expires_at = null;
        $user->save();
        return $this->api_success_massage('Password Changed Successfully');
    }
}
