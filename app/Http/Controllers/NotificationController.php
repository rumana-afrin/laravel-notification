<?php

namespace App\Http\Controllers;

use App\Models\ItemNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class NotificationController extends Controller
{

    // public function getNotifications()
    // {
    //     $notifications = ItemNotification::where('user_id', Auth::id())
    //         ->where('is_read', false)
    //         ->get();

    //     return response()->json($notifications);
    // }
    public function fetchNotifications(Request $request)
    {
        // Ensure only unread notifications are fetched for the authenticated user
        $notifications = $request->user()->Notifications->map(function ($notification) {
            
            return [
                'id' => $notification->id,
                'message' => $notification->data ?? 'No message available',
                'type' => $notification->type,
                'time' => $notification->created_at->diffForHumans(), // Format the time
            ];
        });

        Log::info($notifications);

        return response()->json($notifications);
    }

   
}
