<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login()
    {
        return view('auth.login'); // Ensure the login view exists
    }
    
    public function handel_login(Request $request) 
    {
        $request->validate([
            "useremail" => 'required|email:rfc,dns|exists:users,email',
            "userpassword" => 'required|string|min:6',
        ]);
    
        if (Auth::attempt(['email' => $request->useremail, 'password' => $request->userpassword])) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
    
        return back()->with('error', 'Password does not match');
    }
    
   
    function logout() {
        Auth::logout();
        return redirect()->intended('/');
    }
}
