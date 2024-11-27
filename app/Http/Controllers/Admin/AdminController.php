<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {

        $data['pageTitle'] = "Admin Profile";
        $data['parentAdminShowCalass'] = "Show";
        $data['parentAdminActiveCalass'] = "Active";
        $admin_id = Auth::user()->id;

        $data['admin_data'] = User::find($admin_id);
        return view('admin.dashboard')->with($data);
    }



}
