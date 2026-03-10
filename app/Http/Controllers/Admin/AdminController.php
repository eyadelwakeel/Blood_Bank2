<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;


class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return view('admin.admins.index', compact('admins'));
    }   
    public function edit()
    {
        $admin = Auth::guard('admin')->user();

        return view('admin.profile', compact('admin'));
    }


public function update(Request $request)
{
    /** @var \App\Models\Admin $admin */
    $admin = Auth::guard('admin')->user();


    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:admins,email,' . $admin->id,
        'current_password' => ['nullable', 'required_with:password', function ($attribute, $value, $fail) use ($admin) {
            if ($value && !Hash::check($value, $admin->password)) {
                $fail('Current password is incorrect');
            }
        }],
        'password' => 'nullable|min:6|confirmed'
    ]);

    $admin->update([
        'name' => $request->name,
        'email' => $request->email,
    ]);

    // تغيير الباسورد
    if ($request->filled('password')) {
        $admin->update([
            'password' => Hash::make($request->password)
        ]);
    }

    return redirect()->back()->with('success','Profile Updated');
}
}