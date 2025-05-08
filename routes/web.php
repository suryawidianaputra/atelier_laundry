<?php

use App\Http\Controllers\view\UsersHistoryOrder;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Middleware\AuthorizationMiddleware;
use App\Http\Middleware\CheckCookieMiddleware;

use App\Http\Controllers\view\DashboardController;
use App\Http\Controllers\view\LandingPageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\view\ReservasiController;

// api
use App\Http\Controllers\api\OrderController;
use App\Http\Controllers\api\PackageController;
use App\Http\Controllers\view\UserProfileController;
use Illuminate\Support\Facades\Cookie;

Route::middleware(CheckCookieMiddleware::class)->group(function () {
    // Auth
    Route::get('/', [LandingPageController::class, 'index'])->name('landing-page');

    Route::middleware([AuthorizationMiddleware::class . ':no'])->group(function () {
        Route::get('/auth/login', [AuthController::class, 'Login'])->name('auth-login');
        Route::get('/auth/register', [AuthController::class, 'Register'])->name('auth-register');
        Route::get('/forget-password', function () {
            return view('auth.forget-password');
        });
    });

    // customer
    Route::middleware([RoleMiddleware::class . ':customer'])->group(function () {
        Route::get('/reservasi', [ReservasiController::class, 'index'])->name('reservasi-page');
        Route::get('/order-history', [UsersHistoryOrder::class, 'index'])->name('users-history-order-page');
        Route::get('/profile', [UserProfileController::class, 'index'])->name('users-profile-page');
    });

    // admin
    Route::middleware([RoleMiddleware::class . ':admin'])->group(function () {
        Route::get('/dashboard/{params?}/{paramsEnd?}', [DashboardController::class, 'index'])->name('dashboard');
    });

    Route::prefix("/api")->group(function () {
        // user
        Route::post('/auth/login', [AuthController::class, 'HandleLogin'])->name('api-login');
        Route::post('/auth/register', [AuthController::class, 'hanldeRegister'])->name('api-register');
        // Route::middleware([RoleMiddleware::class . ':admin'])->group(function () {
        // order
        Route::post('/new-order', [OrderController::class, 'CreateOrder'])->name('api-new-order');
        Route::post('/update-order', [OrderController::class, 'updateOrder'])->name('api-update-order');
        Route::post('/reservasi', [OrderController::class, 'reservation'])->name('api-reservasi');
        // package
        Route::post('/update-package', [PackageController::class, 'updatePackage'])->name('api-update-package');
        Route::post('/new-package', [PackageController::class, 'newPackage'])->name('api-new-package');
        Route::get('/delete-package', [PackageController::class, 'deletePackage'])->name('api-delete-package');
    });
    // });
});


// logout
Route::get('/logout', function () {
    Cookie::queue(Cookie::forget('user_data'));
    session()->forget('user_data');
    return back();
});

Route::get('/get', function () {
    session(['user_data' => ['user_id' => 1, "role" => 'admin']]);
});
