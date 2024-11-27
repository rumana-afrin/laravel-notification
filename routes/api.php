<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Api\Admin\ItemApiController;
use App\Http\Controllers\Api\AdminProfileController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\User\ItemController;
use App\Http\Controllers\Api\UserProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\DashboardController;




Route::post('register/store', [RegisterController::class, 'store']);
Route::post('login/store', [LoginController::class, 'store']);

Route::middleware('auth:api')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::post('logout', [DashboardController::class, 'logout']);
});


Route::group(['middleware' => ['auth:api', 'role:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    // Route::get('/', [AdminController::class, 'index']);

    //admin frofile update
    Route::get('edit/profile', [AdminProfileController::class, 'editAdminProfile'])->name('admin');
    Route::post('update/profile', [AdminProfileController::class, 'updateAdminProfile']);
    Route::put('change-password', [AdminProfileController::class, 'UpdateAdminPassword']);

    // Admin Item routes
    Route::resources([
        'items' => ItemApiController::class,
    ]);

    //approved routes
    Route::post('item/status/{id}', [ItemApiController::class, 'updateItemStatus']);
    //notificatins
    Route::get('notifications', [NotificationController::class, 'getAdminNotifications']);



});

Route::group(['middleware' => ['auth:api', 'role:user'], 'prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('/', [UserProfileController::class, 'index'])->name('user');

    //admin frofile update
    Route::post('update-user', [UserProfileController::class, 'updateUserProfile']);
    Route::put('change-password', [UserProfileController::class, 'UpdateUserPassword']);

    //User Item routes
    Route::resources([
        'items' => ItemController::class,
    ]);
    
});
