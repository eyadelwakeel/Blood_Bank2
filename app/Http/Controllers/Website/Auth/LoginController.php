<?php

namespace App\Http\Controllers\Website\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Website\loginRequest;

class LoginController extends Controller
{
    

    
    public function showLoginForm()
    {
        return view('website.subpages.auth.login');
    }  

    
    public function login(loginRequest $request)
    {
        $credentials = $request->only('phone', 'password');

        $remember = $request->has('remember');

        if (auth()->guard('web')->attempt($credentials, $remember)) {
            return redirect()->route('website.home');
        }

        return back()->withErrors([
            'phone' => 'The provided credentials do not match our records.',
        ])->onlyInput('phone');
    }

        public function logout(Request $request)
        {
            auth()->guard('web')->logout();
    
            $request->session()->invalidate();
    
            $request->session()->regenerateToken();
    
            return redirect()->route('website.home');
        }
 }

