<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('forgetpassword', [OtpController::class, 'forgetpassword'])->name('forget.password');
Route::post('otp/generate', [OtpController::class, 'generateOtp'])->name('otp.generate');
Route::post('otp/verify', [OtpController::class, 'verifyOtp'])->name('user.otp.verify');
Route::post('password/reset', [OtpController::class, 'resetPassword'])->name('user.password.reset');

Route::prefix('user')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('user.login');
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->name('user.logout');

    Route::middleware(['auth:web'])->group(function () {
        Route::get('home', function () {
            return view('auth.home');
        })->name('user.home');
        Route::get('products', [ProductController::class, 'products'])->name('products');
        Route::get('products/search', [ProductController::class, 'search'])->name('products.search');
    });
});

Route::prefix('admin')->group(function () {
    Route::get('login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminController::class, 'login']);
    Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::middleware(['auth:admin'])->group(function () {
        Route::resource('products', ProductController::class);
        Route::resource('categories', CategoryController::class);
    });
});
