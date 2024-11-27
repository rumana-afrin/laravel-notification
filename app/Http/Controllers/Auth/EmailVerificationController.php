<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
     // Display the verification notice
     public function notice()
     {
         return view('auth.verify-email');
     }

     public function verify(EmailVerificationRequest $request)
     {
         $request->fulfill(); // Mark the user as verified
 
         return redirect('/home'); // Redirect after verification
     }

    public function resendWithoutLogin(Request $request)
    {
        // Validate the provided email
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        // Find the user by email
        $user = User::where('email', $request->email)->first();

        // Check if the user is already verified
        if ($user->hasVerifiedEmail()) {
            return response()->json([
                'message' => 'This email is already verified.',
            ], 400);
        }

        // Resend the verification email
        event(new Registered($user));

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'We' . '\'' . 've sent a verification link to your email address.',
                'user_email' => $user->email
            ], 200);
        }
        
        return back()->with([
            'message' => 'We' . '\'' . 've sent a verification link to your email address.',
            'user_email' => $user->email
        ]);;
        

        // return back()->with('message', 'Verification email resent successfully.');

    }
}
