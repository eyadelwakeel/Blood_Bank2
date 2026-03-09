<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        $admin->fill([
            'name' => $request->name,
            'email' => $request->email,
        ])->save();

        if ($request->password) {
            $admin->password = Hash::make($request->password);
            $admin->save();
        }

        return redirect()->back()->with('success','Profile Updated');
    }
}