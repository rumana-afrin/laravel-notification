<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\ItemController;
use App\Http\Controllers\User\UserProfileController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [HomeController::class, 'index']);


//start register
Route::get('register', [RegisterController::class, 'create'])->name('register');
Route::post('register/store', [RegisterController::class, 'store'])->name('register.store');

//start login
Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login/store', [LoginController::class, 'store'])->name('login.store');

//
Route::middleware('auth')->prefix('web')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('logout', [DashboardController::class, 'logout'])->name('logout');
});

// user route
Route::middleware(['auth', 'role:user'])->prefix('web')->group(function () {
    Route::get('/', [UserProfileController::class, 'index'])->name('user');
    Route::put('update/user', [UserProfileController::class, 'updateUserProfile'])->name('user.update');
    Route::put('change-password', [UserProfileController::class, 'UpdateUserPassword'])->name('change-password');

    //Item routes
    Route::resources([
        'items' => ItemController::class,
    ]);
});

//email verification routes
Route::get('verification.notice', [EmailVerificationController::class, 'notice'])->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');

Route::post('/email/resend', [EmailVerificationController::class, 'resendWithoutLogin'])
->middleware(['throttle:6,1']) // 6 requests per minute
->name('verification.resend');
 
//forget password route
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('reset.password');
Route::post('/update-password', [ForgotPasswordController::class, 'resetPassword'])->name('update.password');

