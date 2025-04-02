<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Middleware\AuthorizationMiddleware;

use App\Http\Controllers\view\DashboardController;
use App\Http\Controllers\view\LandingPageController;
use App\Http\Controllers\AuthController;

Route::get('/', [LandingPageController::class, 'index'])->name('landing-page');

Route::middleware([AuthorizationMiddleware::class . ':no'])->group(function () {
    Route::get('/auth/login', [AuthController::class, 'Login'])->name('login-page');
    Route::get('/auth/register', [AuthController::class, 'Register'])->name('rgister-page');
});

Route::middleware([RoleMiddleware::class . ':admin'])->group(function () {
    Route::get('/dashboard/{params?}', [DashboardController::class, 'index'])->name('dashboard');
});


Route::prefix("/api")->group(function () {
    // 
});


use App\Models\AuthModel;

Route::get('/get-role', function () {
    Cookie::queue(Cookie::make('role', 'admin'));
    return redirect('/');
});

Route::get('/remove-cookie/{cookie_name}', function ($cookie_name) {
    Cookie::queue(Cookie::forget($cookie_name));
    return redirect('/');
});

Route::get('/set-cookie', function () {
    $user_data = ['user_id' => 1, 'role' => 'admin'];
    Cookie::queue(Cookie::make('user_data', json_encode($user_data)));
    session(['user_data' => $user_data]);
    return redirect('/');
});

Route::get('/view-cookie/{cookie_name}', function ($cookie_name) {
    var_dump($cookie_name == 'all' ? Cookie::get() : Cookie::get($cookie_name));
});

Route::get('/ex', function () {
    // var_dump(json_decode(Cookie::get('user_data'), true));
    var_dump(AuthModel::CheckSession()['data']);
});