<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;


class SettingController extends Controller
{
    //
    public function index()
    {
        $settings = Setting::first();
        return view('admin.settings.index', compact('settings'));
    }   
    public function edit()
    {
        $settings = Setting::first();
        return view('admin.settings.edit', compact('settings'));
    }
    public function update(Request $request)
    {
        $settings = Setting::first();
        $settings->update([
            'phone' => $request->phone,
            'email' => $request->email,
            'fb_url' => $request->fb_url,
            'x_url' => $request->x_url,
            'app_store_url' => $request->app_store_url,
            'youtube_url' => $request->youtube_url,
            'about_app' => $request->about_app,
        ]);
        
        return redirect()->route('admin.settings.index')->with('success', 'Settings Updated');
    }

}
