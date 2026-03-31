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

        return view('admin.admins.edit', compact('admin'));
    }
    public function create()
    {
        return view('admin.admins.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:8|confirmed',
        ]);

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.admins.index')->with('success', 'Admin Created');
    }


public function update(Request $request)
{
    /** @var \App\Models\Admin $admin */

    $admin = Auth::guard('admin')->user();

    $request->validate([
        'name' => 'required|string|max:255',
        'password' => 'nullable|min:6|confirmed',
    ]);

    if (
        $request->name !== $admin->name ||
        $request->filled('password')
    ) {
        $request->validate([
            'current_password' => [
                'required',
                function ($attribute, $value, $fail) use ($admin) {
                    if (!Hash::check($value, $admin->password)) {
                        $fail('Current password is incorrect');
                    }
                }
            ]
        ]);
    }

    $data = [
        'name' => $request->name,
        'email' => $request->email,
    ];

    if ($request->filled('password')) {
        $data['password'] = Hash::make($request->password);
    }

    $admin->update($data);

    return redirect()->back()->with('success', 'Profile Updated');
}
}