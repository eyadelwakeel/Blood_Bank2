<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\models\BloodType;
use App\models\Citiy;
use App\models\Governorate;
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
}
