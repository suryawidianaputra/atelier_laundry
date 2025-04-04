<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;

use App\Http\Middleware\RoleMiddleware;
use App\Http\Middleware\AuthorizationMiddleware;
use App\Http\Middleware\CheckCookieMiddleware;

use App\Http\Controllers\view\DashboardController;
use App\Http\Controllers\view\LandingPageController;
use App\Http\Controllers\AuthController;

Route::middleware(CheckCookieMiddleware::class)->group(function () {
    Route::get('/', [LandingPageController::class, 'index'])->name('landing-page');

    Route::middleware([AuthorizationMiddleware::class . ':no'])->group(function () {
        Route::get('/auth/login', [AuthController::class, 'Login'])->name('auth-login');
        Route::get('/auth/register', [AuthController::class, 'Register'])->name('auth-register');
    });

    Route::middleware([RoleMiddleware::class . ':admin'])->group(function () {
        Route::get('/dashboard/{params?}/{paramsEnd?}', [DashboardController::class, 'index'])->name('dashboard');
    });


    Route::prefix("/api")->group(function () {
        // 
    });
});



use App\Models\AuthModel;
use App\Models\UsersModel;
use App\Models\PackagesModel;

Route::get('/get-role', function () {
    Cookie::queue(Cookie::make('role', 'admin'));
    return redirect('/');
});

Route::get('/remove-cookie/{cookie_name}', function ($cookie_name) {
    Cookie::queue(Cookie::forget($cookie_name));
    return redirect('/');
});

Route::get('/set-cookie/{role?}', function ($role = 'user') {
    $user_data = ['user_id' => 1, 'role' => $role];
    Cookie::queue(Cookie::make('user_data', json_encode($user_data), 60 * 24));
    session(['user_data' => $user_data]);
    return redirect('/');
});

Route::get('/view-cookie/{cookie_name}', function ($cookie_name) {
    var_dump($cookie_name == 'all' ? Cookie::get() : Cookie::get($cookie_name));
});

Route::get('/logout', function () {
    Cookie::queue(Cookie::forget('user_data'));
    session()->forget('user_data');
    return redirect('/');
});
Route::get('/ex', function () {
    $user_id = AuthModel::CheckSession()['data']['user_id'];
    $user_data = UsersModel::where('id', $user_id)->value('username') ?? 'User';

    var_dump($user_data);
});

Route::get('/up', function () {
    $upload = PackagesModel::create(['package_name' => 'Leguler'])->first();
    var_dump($upload);
});
