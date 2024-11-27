<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route; 
use Illuminate\Support\Facades\Broadcast;


Broadcast::routes(['middleware' => ['auth', 'role:admin']]);

Route::group(['middleware' => ['auth', 'role:admin'], 'prefix' => 'web/admin', 'as' => 'web/admin.'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');

    //admin frofile update
    Route::get('edit/profile', [AdminProfileController::class, 'editAdminProfile'])->name('edit.profile');
    Route::put('update/profile', [AdminProfileController::class, 'updateAdminProfile'])->name('profile.update');
    Route::put('change-password', [AdminProfileController::class, 'UpdateAdminPassword'])->name('change-password');

    //notificatins
    // Route::get('notifications', [NotificationController::class, 'getNotifications'])->name('notifications');
    Route::post('mark-as-read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
    Route::get('fetch-notifications', [NotificationController::class, 'fetchNotifications'])->name('notifications.fetch');
    //Item routes
    
    Route::resources([
        'items' => ItemController::class,
    ]);

    //approved routes
    Route::post('item/status/{id}', [ItemController::class, 'updateItemStatus'])->name('item.status');
    Route::get('/item/{id}', [ItemController::class, 'showItem'])->name('item.show');


});
