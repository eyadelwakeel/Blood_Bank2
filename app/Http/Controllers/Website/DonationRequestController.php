<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\DonationRequest;
use App\Models\BloodType;
use App\Models\City;
use Illuminate\Http\Request;
use App\Models\Governorate;
use App\Models\BloodTypeCity;
use App\Models\BloodTypeGovernorate;
use App\Models\User;
use App\Notifications\DonationRequestNotification;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\Website\DonationsRequest;

class DonationRequestController extends Controller
{
    //
    public function index(Request $request)

    {
        $cities = City::all();
        $bloodTypes = BloodType::all();

        $donationRequests = DonationRequest::with(['city', 'bloodType'])
            ->when($request->city_id, function ($query) use ($request) {
                $query->where('city_id', $request->city_id);
            })
            ->when($request->blood_type_id, function ($query) use ($request) {
                $query->where('blood_type_id', $request->blood_type_id);
            })
            ->paginate(10)
            ->withQueryString();

        $donationRequests = DonationRequest::with('bloodType', 'city', 'user')->paginate(10);
        return view('website.subpages.donation_request', compact('donationRequests', 'cities', 'bloodTypes'));
    }
    public function show($id)
    {
        $donationRequest = DonationRequest::with('bloodType', 'city','user')->findOrFail($id);
        return view('website.subpages.donation_request', compact('donationRequest'));
    }
}
