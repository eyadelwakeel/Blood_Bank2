<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DonationRequest;
use App\Models\Post;
use App\Models\City;
use App\Models\Governorate;
use App\Models\BloodType;
use App\Models\Category;

class DashboardController extends Controller
{
    //
    public function home()
    {
        $usersCount = User::count();
        $donationRequestsCount = DonationRequest::count();
        $categoriesCount = Category::count();
        $postsCount = Post::count();
        $governoratesCount = Governorate::count();
        $citiesCount = City::count();
        $bloodTypesCount = BloodType::count();
        
        return view('admin.home', compact('usersCount', 'donationRequestsCount', 'categoriesCount', 'postsCount', 'governoratesCount', 'citiesCount', 'bloodTypesCount'));
    }
}