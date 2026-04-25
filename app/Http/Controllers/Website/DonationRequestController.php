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
use Illuminate\Support\Facades\Auth;

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

        return view('website.subpages.donation_request', compact('donationRequests', 'cities', 'bloodTypes'));
    }

    public function create()
    {
        $bloodTypes = BloodType::all();
        $governorates = Governorate::all();
        return view('website.subpages.make-donation-request', compact('bloodTypes', 'governorates'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required|integer',
            'blood_type_id' => 'required',
            'city_id' => 'required',
            'phone' => 'required',
            'hospital_name' => 'required',
            'bags_number' => 'required|integer',
        ]);

        DonationRequest::create([
            'name' => $request->name,
            'age' => $request->age,
            'blood_type_id' => $request->blood_type_id,
            'city_id' => $request->city_id,
            'phone' => $request->phone,
            'notes' => $request->notes,
            'hospital_name' => $request->hospital_name,
            'bags_number' => $request->bags_number,
            'latitude' => $request->latitude ?? 0.0,
            'longitude' => $request->longitude ?? 0.0,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'تم إنشاء الطلب بنجاح');
    }

   public function getCities($id)
{
    return response()->json(
        City::where('governorate_id', $id)->get()
    );
}
}
