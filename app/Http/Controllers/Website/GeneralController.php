<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\ContactUs;  
use Illuminate\Support\Facades\Auth; 

class GeneralController extends Controller
{
    //
    // who are use page
    public function whoAreUs()
    {
        return view('website.subpages.who_are_us');
    }
    public function contactUs()
    {
        // if user auth write the name of user in name field and email in email field and phone in phone field
        if (Auth::check()) {
            $user = Auth::user();
            $name = $user->name;
            $email = $user->email;
            $phone = $user->phone;
        } else {
            $name = '';
            $email = '';
            $phone = '';
        }
        $settings = Setting::first();
        return view('website.subpages.contact_us',compact('settings','name','email','phone'));
    }
    // submit contact us form
    public function submitContactUs(Request $request)
    {
        $request->validate([
            'subject' => 'string|max:255',
            'message' => 'string'
        ]);
        $contactUs = new ContactUs();
        $contactUs->subject = $request->subject;
        $contactUs->message = $request->message;
        $contactUs->user_id = Auth::id();
        $contactUs->save();
        return redirect()->back()->with('success', 'تم إرسال رسالتك بنجاح');
    }
        
}
