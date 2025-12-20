<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ForgetPasswordRequest;
use App\Mail\SendResetPassord;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ResetPasswordController extends Controller
{
    //
    use ApiResponse;
    public function forgetPassword(ForgetPasswordRequest $request)
    {
        $user = User::where('phone',$request->phone)->first();
        if (!$user) {
            return $this->api_error_massage('This phone not found');
        }
        //generate verification code
        $verification_code = rand(100000, 999999);
        //save the code in database
        $user->verification_code = $verification_code;
        $user->verification_code_expires_at  = now()->addMinutes(2);
        $user->save();
        //send to user via email
        Mail::to($user->email)->send( new SendResetPassord($user) );
        //return success response
        $data = [];
        if(config('app.env') == 'local'){
            $data['verification_code_for_testing'] = $verification_code;
        }
        return $this->api_success_massage('Verification Code Sent Successfuly',$data);
    }
}
