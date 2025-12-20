<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\NotificationSettingRequest;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class NotificationSettingController extends Controller
{
    //
    use ApiResponse;
    public function store(NotificationSettingRequest $request){
        $user = $request->user();

        $user->bloodTypes()->sync($request->blood_types);
        $user->governorates()->sync($request->governorates);

        return $this->api_success_massage([
            'Message' => 'Settings saved successfuly'
        ],200);
    }

    public function getSettings(Request $request){

        $user = $request->user();

        return $this->api_data_response([
            'blood_types' => $user->bloodTypes()->pluck('blood_types.name','blood_types.id'),
            'governorates' => $user->governorates()->pluck('governorates.name','governorates.id')
        ]);
    }
}
