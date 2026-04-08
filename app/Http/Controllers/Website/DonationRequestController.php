<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DonationRequest;
use App\Models\BloodType;
use App\Models\City;
use App\Models\Governorate;
use App\Models\BloodTypeCity;
use App\Models\BloodTypeGovernorate;
use App\Models\User;

class DonationRequestController extends Controller
{
    //
    public function index()
    {
        $donationRequests = DonationRequest::with('bloodType', 'city','user')->paginate(10);
        return view('website.subpages.donation_request', compact('donationRequests'));
    }
    // get all  detalis of donation requests
    public function show($id)
    {
        $donationRequest = DonationRequest::with('bloodType', 'city','user')->findOrFail($id);
        return view('website.subpages.donation_request', compact('donationRequest'));
    }
}
