<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\models\BloodType;
use App\models\Citiy;
use App\models\Governorate;
use App\Models\Setting;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Js;

class GeneralController extends Controller
{
    use ApiResponse;

    public function blood_types()
    {

        $blood_types= BloodType::all();

        $data= [
            'blood_types' => $blood_types
        ];

        return $this->api_response('success',"Done",$data);
    }
    public function governoeates()
    {
        $governoeates= Governorate::all();

        $data = [
            'governorates' =>$governoeates
        ];

        return $this->api_response('success',"Done",$data);
    }
    public function cities(Request $request)
    {
        $cities= Citiy::where(function($query) use ($request){
            if ($request->has('governorate_id'))
            {
                $query->where('governorate_id',$request->governorate_id);
            }
        })->get();

        $data = [
            'cities' =>$cities
        ];

        return $this->api_response('success',"Done",$data);
    }
    public function setting()
    {
        $settings= Setting::all();

        $data = [
            'settings' =>$settings
        ];

        return $this->api_response('success',"Done",$data);
    }
    public function contact_us(Request $request)
    {
          $user = $request->user();

        $validation = validator()->make($request->all(),[
            'subject' => 'required|string',
            'massage' => 'required|string',
        ]);

        if ($validation->fails())
        {
            return $this->api_response('error',$validation->errors()->first(),null,422);
        }

        $contact_us = \App\Models\ContactUs::create([
            'subject' => $request->subject,
            'massage' => $request->massage,
            // 'user_id' => $request->user()->id,
           'user_id' => $user->id,
        ]);

        return $this->api_success_massage('Your message has been sent successfully.',$contact_us);
    }
}