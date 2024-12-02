<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password'); // Ensure this view exists
    }
    public function sendResetLink(Request $request)
    {


        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $token = Str::random(64);
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        Mail::send('auth.forgetpassword.email',['token' => $token],function($message) use ($request){
            $message->to($request->email);
            $message->subject("reset password");
        });
        return redirect()->route('login');

    }


    public function showResetForm($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        // Validate input
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:3|confirmed',
        ]);

        
        $update_pass = DB::table('password_reset_tokens')->where([
            'email' => $request->email,
            'token' => $request->token,
        ])->first();

        if(!$update_pass){
            return back()->withInput()->with('error', 'Token Expired!');
        }

        $user = User::where('email', $request->email)->update([
            'password' => Hash::make($request->password)
        ]);
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();
        return redirect()->route('login');
    
    }
}
