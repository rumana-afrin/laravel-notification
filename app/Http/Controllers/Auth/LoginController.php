<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create(){
        return view('auth.login');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');
        if ($request->expectsJson()) {
           
    
            if (! $token = Auth::guard('api')->attempt($credentials)) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
    
            $user = Auth::guard('api')->user();
    
            if ($user->role === 'admin') {
                $redirectUrl = route('admin.admin');
            } elseif ($user->role === 'user') {
                $redirectUrl = route('user.user');
            } else {
                return response()->json(['error' => 'Unauthorized: Invalid role'], 403);
            }
    
            return response()->json([
                'token' => $token,
                'token_type' => 'bearer',
                'user' => $user,
                'redirect_url' => $redirectUrl,
            ], 200);
        }
    
        if (! Auth::attempt($credentials)) {
            return redirect()->back()->withErrors(['error' => 'These credentials do not match our records.']);
        }
    
        $request->session()->regenerate();
    
        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect()->route('web/admin.admin');
        } elseif ($user->role === 'user') {
            return redirect()->route('user');
        } else {
            return redirect()->route('login')->withErrors(['error' => 'Invalid role']);
        }
    }
    
}




// Correct! If you're using Auth::guard('api')->attempt($credentials), you do not need to use $token = JWTAuth::fromUser($user); because the attempt() method is already handling both:

// Authenticating the user: It checks the provided credentials.
// Generating the JWT token: If authentication is successful, it automatically generates the JWT token for you and returns it.
// After calling Auth::guard('api')->attempt($credentials), the $token variable will hold the JWT token, so you don't need an additional call to JWTAuth::fromUser($user).