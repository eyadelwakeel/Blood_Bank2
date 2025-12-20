<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateDonationRequest;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DonationRequest;

class DonationRequestController extends Controller
{
    //
    use ApiResponse;

    public function index(){
        $donation_requests = DonationRequest::with('bloodType','city','governorate')->paginate();
        return $this->api_success_massage('Donation requests retrieved successfully', $donation_requests);
    }

    public function show($id){

    }

    public function store(CreateDonationRequest $request)
    {
        $donation_request= $request->user()->donation_requests()->create($request->validated());

        // send notifications according to notification settings
        $users_query = User::whereHas('bloodTypes',function($query) use ($donation_request){
            $query->where('blood_type_id',$donation_request->blood_type_id);
        })->whereHas('governorates',function($query) use ($donation_request){
            $query->where('governorate_id',$donation_request->city->governorate_id);
        });


        $users_ids = $users_query->pluck('id')->toArray();

        $notification= $donation_request->notifications()->create([
            'title' => 'New Donation Request',
            'message' => 'A new donation request near by '
        ]);

        if(!empty($users)){

            $notification->users()->attach($users_ids);

            //push fcm notification

            $users = $users_query->get();
            foreach ($users as $user){
                $client->notify(new DonationRequestCreated($notification))
            }
            //get token for each client

            //push notification to each client


        }

        return $this->api_success_massage('Donation request created successfully',$donation_request);

    }
}
