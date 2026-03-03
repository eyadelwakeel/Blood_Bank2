<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DonationRequest;
use App\Services\ReverseGeocodingService;
use App\Models\BloodType;
use App\Models\City;
use App\Http\Requests\Admin\DonationsRequest;



class DonationRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

    return view('admin.donation_requests.index', compact('donationRequests', 'cities', 'bloodTypes'));

}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $bloodTypes = BloodType::all();
        $cities = City::all();

        return view('admin.donation_requests.create', compact('bloodTypes', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DonationsRequest $request)
    {
        DonationRequest::create($request->validated());
        return redirect()->route('admin.donation-requests.index')->with('success', 'Donation request created successfully.');


    }

    /**
     * Display the specified resource.
     */
    public function show(DonationRequest $donationRequest, ReverseGeocodingService $geocodingService)
{
    $donationRequest->load('city');

    if (!$donationRequest->hospital_address) {
        $donationRequest->hospital_address = $geocodingService->getAddress(
            $donationRequest->latitude,
            $donationRequest->longitude
        );

        $donationRequest->save();
    }

    return view('admin.donation_requests.show', compact('donationRequest'));
}
   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $donationRequest = DonationRequest::findOrFail($id);
        $bloodTypes = BloodType::all();
        $cities = City::all();
        return view('admin.donation_requests.edit', compact('donationRequest', 'bloodTypes', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $donationRequest = DonationRequest::findOrFail($id);
        $donationRequest->update($request->all());
        return redirect()->route('admin.donation-requests.index')->with('success', 'Donation request updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $donationRequest = DonationRequest::findOrFail($id);
        $donationRequest->delete();
        return redirect()->route('admin.donation-requests.index')->with('success', 'Donation request deleted successfully.');
    }
    
}
