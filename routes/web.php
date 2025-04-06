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
        Route::post('/auth/login', [AuthController::class, 'HandleLogin'])->name('api-login');
        Route::post('/auth/register', [AuthController::class, 'hanldeRegister'])->name('api-register');
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
    $a = AuthModel::CheckSession();
    $b = AuthModel::CheckCookie()['data'];

    var_dump([$a]);

    // if ($remember) {
    //     AuthModel::setCookie('user_data', json_encode($user_data));
    // }

    // $user_data = ['role' => $this->user_data->role, 'user_id' => $this->user_data->id];
    // $user_data = ['user_data' => ['role' => 'customer', 'user_id' => '1']];

    // session($user_data);
    // return redirect('/');
});

Route::get('/up', function () {
    $upload_data = UsersModel::create([
        'username' => 'test',
        'email' => 'real@gmail.com',
        'password' => 'akdsjfa;ksdjf',
        'address' => 'aldsjfa;dlsk',
        'phone_number' => 'aksdjf;alksdss'
    ])->first();
    var_dump($upload_data->role);
});
