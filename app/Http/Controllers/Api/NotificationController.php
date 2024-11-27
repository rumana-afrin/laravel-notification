<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ItemNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function getAdminNotifications()
{
    $notifications = ItemNotification::where('user_id', Auth::id())
    ->where('is_read', false)
    ->get(); 
    return response()->json([
        'status' => 'success',
        'notifications' => $notifications
    ]);
}

}
