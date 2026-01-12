<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DonationRequest;
use App\Services\ReverseGeocodingService;

class DonationRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $donationRequests = DonationRequest::paginate(10);
        
        return view('admin.donation_requests.index', compact('donationRequests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id, ReverseGeocodingService $geocodingService)
    {
        $donationRequest = DonationRequest::findOrFail($id);
        $address = $geocodingService->getAddress($donationRequest->latitude, $donationRequest->longitude);
        return view('admin.donation_requests.show', compact('donationRequest', 'address'));
    }   
   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
