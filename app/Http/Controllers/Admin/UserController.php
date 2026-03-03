<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Governorate;
use App\Models\City;
use App\Models\BloodType;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
//    
public function index(Request $request)
{
    $governorates = Governorate::all();
    $cities = City::all();
    $bloodTypes = BloodType::all();

    $users = User::with(['city.governorate', 'bloodType'])
        ->when($request->governorate_id, function ($query) use ($request) {
            $query->whereHas('city', function ($q) use ($request) {
                $q->where('governorate_id', $request->governorate_id);
            });
        })
        ->when($request->city_id, function ($query) use ($request) {
            $query->where('city_id', $request->city_id);
        })
        ->when($request->blood_type_id, function ($query) use ($request) {
            $query->where('blood_type_id', $request->blood_type_id);
        })
        ->paginate(10)
        ->withQueryString(); 

    return view('admin.users.index', compact('users', 'governorates', 'cities', 'bloodTypes'));
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
    public function show(string $id)
    {
        //
        $user = User::with(['city.governorate', 'bloodType'])->findOrFail($id);
        return view('admin.users.show', compact('user'));
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
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
    
    // Toggle user active status

    public function toggle(User $user)
    {
        $user->update([
            'is_active' => !$user->is_active
        ]);

        return back()->with('success', 'User status updated successfully.');
    }
}