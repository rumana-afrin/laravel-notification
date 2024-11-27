<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use PHPOpenSourceSaver\JWTAuth\Exceptions\JWTException;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class DashboardController extends Controller
{


    public function index(Request $request)
    {
        if ($request->expectsJson()) {

            try {
                $user = Auth::guard('api')->user();
                if (!$user) {
                    return response()->json(['error' => 'Unauthorized'], 401);
                }

                $token = JWTAuth::fromUser($user);

                if ($user->role === 'admin') {
                    $redirectUrl = route('admin.admin');
                } elseif ($user->role === 'user') {
                    $redirectUrl = route('user.user');
                } else {
                    return response()->json(['error' => 'Unauthorized: Invalid role'], 403);
                }

                return response()->json([
                    'token' => $token,
                    'user' => $user,
                    'token_type' => 'bearer',
                    'redirect_url' => $redirectUrl,
                    // 'expires_in' => JWTAuth::factory()->getTTL() * 60
                ], 201); // 201 = Created
            } catch (JWTException $e) {
                return response()->json(['error' => 'Could not create token'], 500);
            }
        }

        $request->session()->regenerate();
        $url = "";
        if ($request->user()->role == 'admin') {
            $url = "web/admin";
        } else {
            $url = "web/";
        }

        return redirect()->intended($url);
    }

    public function logout(Request $request)
    {
        if (auth()->guard('api')->check()) {
            // API logout
            try {
                auth()->guard('api')->logout();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Successfully logged out',
                ], 200);
            } catch (\Exception $e) {
                return response()->json([
                    'error' => 'Failed to logout, try again'
                ], 500);
            }
        } elseif (auth()->guard('web')->check()) {
            // Web logout
            auth()->guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/')->with('message', 'Successfully logged out');
        }
    
        return response()->json(['error' => 'No active session found'], 400);
    }
    


}
