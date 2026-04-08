<?php

namespace App\Http\Controllers\Website\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Governorate;
use App\Models\City;
use App\Models\BloodType;
use App\Http\Requests\Website\RegisterRequest as WebsiteRegisterRequest;

class RegisterController extends Controller
{
    //
   

    public function showRegistrationForm()
    {
        $governorates = Governorate::all();
        $cities = Governorate::with('cities')->get();
        $blood_types = BloodType::all();

        return view('website.subpages.auth.register', compact('governorates', 'cities', 'blood_types'));
    }

    public function getCities($governorate_id)
    {
        $cities = City::where('governorate_id', $governorate_id)->get();
        return response()->json($cities);
    }

    public function register(WebsiteRegisterRequest $request)
    {
       
        $data = $request->validated();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'birth_date' => $data['birth_date'] ?? null,
            'last_donation_date' => $data['last_donation_date'] ?? null,
            'phone' => $data['phone'],
            'blood_type_id' => $data['blood_type_id'] ?? null,
            'city_id' => $data['city_id'] ?? null,
            'password' => bcrypt($data['password']),
        ]);

        auth()->guard('web')->login($user);

        return redirect()->route('website.home');
    }
}
