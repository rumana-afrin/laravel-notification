<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class UserProfileController extends Controller
{
    public function index()
    {

        $user = Auth::guard('api')->user();
        $newToken = JWTAuth::refresh(JWTAuth::getToken());

        return response()->json([
            'status' => 'success',
            'user_data' => $user,
            'token' => $newToken,
        ]);
    }

    public function updateUserProfile(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::guard('api')->user();
        $request->validate([
            'name' => 'required|string|max:225',
            'username' => 'required|string|max:225',
            'phone' => 'required|regex:/^[0-9]+$/',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user),],
        ]);

        $data = $request->only(['name', 'username', 'phone', 'email']);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $file_name = time() . $image->getClientOriginalName();
            $fileName = pathinfo($file_name, PATHINFO_FILENAME);
            $fileExtension = pathinfo($file_name, PATHINFO_EXTENSION);
            $file_name = preg_replace('/\s+/', '', $fileName);
            $file_name = preg_replace('/[^A-Za-z0-9\-]/', '', $file_name);
            $file_name = $file_name . "." . $fileExtension;
            $storage = $image->storeAs('upload', $file_name, 'public');

            if ($user->image && Storage::disk('public')->exists($user->image)) {
                Storage::disk('public')->delete($user->image);
            }
            $data['image'] = $storage;
        }

        $user->update($data);
        return response()->json([
            'status' => 'success',
            'user_data' => $data,
        ]);
    }

    public function UpdateUserPassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password'     => 'required|string|confirmed|min:3',
        ]);
          /** @var \App\Models\User $user */
        $user = Auth::guard('api')->user();
    
        if (!Hash::check($request->old_password, $user->password)) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Old password does not match',
            ], 400);
        }
    
        $user->password = Hash::make($request->password);
        $user->save(); 

        return response()->json([
            'status'  => 'success',
            'message' => 'Password updated successfully',
        ], 200);
    }
    
}
