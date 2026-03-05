<?php

namespace App\Http\Controllers;

use App\Models\Governorate;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DonationRequest;
use App\Models\Post;
use App\Models\City;
use App\Models\BloodType;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usersCount = User::count();
        $donationRequestsCount = DonationRequest::count();
        $postsCount =  Post::count();
        $governoratesCount = Governorate::count();
        $citiesCount = City::count();
        $bloodTypesCount = BloodType::count();
        
        return view('admin.home', compact('usersCount', 'donationRequestsCount', 'postsCount', 'governoratesCount', 'citiesCount', 'bloodTypesCount'));
    }
}
