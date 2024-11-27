<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
class UserProfileController extends Controller
{
    public function index()
    {
        $data['pageTitle'] = "User Profile";
        $data['parentUserShowCalass'] = "Show";
        $data['parentUserActiveCalass'] = "Active";
        $user_id = Auth::user()->id;

        $data['user_data'] = User::find($user_id);
        return view('user.dashboard')->with($data);
    }
    public function updateUserProfile(Request $request)
    {
// dd($request->all());
       
        $user_id = Auth::user()->id;
        $request->validate([
            'name' => 'required|string|max:225',
            'username' => 'required|string|max:225',
            'phone' => 'required|regex:/^[0-9]+$/',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user_id),],
        ]);

        $user_data = User::findOrFail($user_id);

        $data = $request->only(['name', 'username', 'email', 'phone']);
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $file_name = time() . $image->getClientOriginalName();
            $fileNmae = pathinfo($file_name, PATHINFO_FILENAME);
            $fileExtension = pathinfo($file_name, PATHINFO_EXTENSION);
            $file_name = preg_replace('/\s+/', '', $fileNmae);
            $file_name = preg_replace('/[^A-Za-z0-9\-]/', '', $file_name);
            $file_name = $file_name . "." . $fileExtension;
            $storage = $image->storeAs('upload', $file_name, 'public'); 

            if ($user_data->image && Storage::disk('public')->exists($user_data->image)) {
                Storage::disk('public')->delete($user_data->image);
            }
            $data['image'] = $storage;
 
        }
        // dd($data);
        $user_data->update($data);
        return redirect()->back()->with('success', UPDATED_SUCCESSFULLY);
    }

    public function UpdateUserPassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password'     => 'required|string|confirmed|min:3',
        ]);

        if (!Hash::check($request->old_password, Auth::user()->password)) {
            return redirect()->back()->with('error', "old password does not match");
        }

        $id = Auth::user()->id;
        if ($id) {
            User::whereId($id)->update([
                'password' => Hash::make($request->password),
            ]);
        }
        return redirect()->back()->with('success', UPDATED_SUCCESSFULLY);
    }
}
