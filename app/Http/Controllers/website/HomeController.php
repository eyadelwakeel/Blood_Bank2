<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\City;
use App\Models\Governorate;
use App\Models\DonationRequest;

class HomeController extends Controller
{
    //
    public function index()
    {
        $bloodTypes = BloodType::all();
        $cities = City::all();
        $governorates = Governorate::all();
        $donationRequests = DonationRequest::limit(3)->get();
        $posts = Post::all()->take(9);
        $settings = Setting::first();

        return view('website.home', compact('posts', 'settings', 'bloodTypes', 'cities', 'governorates', 'donationRequests'));
    }
}
