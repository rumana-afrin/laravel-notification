<?php

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Log;


Broadcast::channel('App.Models.User.{adminId}', function ($user,$adminId) {
    Log::info('Checking channel authorization for user: ', ['user' => $user->id, 'role' => $user->role]);
    return $user->isAdmin() && $user->id == $adminId;
});


// Broadcast::channel('new-user', function ($user) {
//     // Only allow users with an admin role to listen to this channel
//     return $user->isAdmin();
// });

Broadcast::channel('new-user.{adminId}', function ($user, $adminId) {
    // Check if the user has an admin role and the ID matches
    return $user->isAdmin() && $user->id == $adminId;
});