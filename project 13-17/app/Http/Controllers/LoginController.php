<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest; // Ensure this is there if you're using UserRequest

class LoginController extends Controller
{
    public function loginForm()
    {
        return view('auth/login');
    }

    // Corrected the syntax error: removed the colon and added curly braces
    public function authenticate(Request $request)
    {
        // Validate the login credentials
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            // Regenerate the session to prevent session fixation attacks
            $request->session()->regenerate();
            
            // Redirect the user to the intended page, or to 'dashboard' if not set
            return redirect()->intended('dashboard');
        }

        
    }
}
