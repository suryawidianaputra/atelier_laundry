<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;

use App\Http\Middleware\RoleMiddleware;
use App\Http\Middleware\AuthorizationMiddleware;
use App\Http\Middleware\CheckCookieMiddleware;

use App\Http\Controllers\view\DashboardController;
use App\Http\Controllers\view\LandingPageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\view\ReservasiController;

// api
use App\Http\Controllers\api\OrderController;

Route::middleware(CheckCookieMiddleware::class)->group(function () {
    // Auth
    Route::get('/', [LandingPageController::class, 'index'])->name('landing-page');

    Route::middleware([AuthorizationMiddleware::class . ':no'])->group(function () {
        Route::get('/auth/login', [AuthController::class, 'Login'])->name('auth-login');
        Route::get('/auth/register', [AuthController::class, 'Register'])->name('auth-register');
    });

    // customer
    Route::middleware([RoleMiddleware::class . ':customer'])->group(function () {
        Route::get('/reservasi', [ReservasiController::class, 'index'])->name('reservasi-page');
    });

    // admin
    Route::middleware([RoleMiddleware::class . ':admin'])->group(function () {
        Route::get('/dashboard/{params?}/{paramsEnd?}', [DashboardController::class, 'index'])->name('dashboard');
    });

    Route::prefix("/api")->group(function () {
        // user
        Route::post('/auth/login', [AuthController::class, 'HandleLogin'])->name('api-login');
        Route::post('/auth/register', [AuthController::class, 'hanldeRegister'])->name('api-register');
        // order
        Route::post('/new-order', [OrderController::class, 'CreateOrder'])->name('api-new-order');
        Route::post('/update-order', [OrderController::class, 'updateOrder'])->name('api-update-order');
        // Route::get('/order-userid/{user_id}', [OrderController::class, 'GetOrderByUserId'])->name('api-order-userid');
        // Route::get('/order-orderid/{order_id}', [OrderController::class, 'GetOrderByUserId'])->name('api-order-userid');
    });
});



// dev
use App\Models\AuthModel;
use App\Models\UsersModel;
use App\Models\transactionsModel;
use App\Models\PaymentMethod;

Route::get('/view-cookie/{cookie_name}', function ($cookie_name) {
    var_dump($cookie_name == 'all' ? Cookie::get() : Cookie::get($cookie_name));
});

Route::get('/logout', function () {
    Cookie::queue(Cookie::forget('user_data'));
    session()->forget('user_data');
    return redirect('/');
});

Route::get('/ex', function () {
    $a = AuthModel::CheckSession()['data'];
    $b = AuthModel::CheckCookie()['data'];

    var_dump('');

    // if ($remember) {
    //     AuthModel::setCookie('user_data', json_encode($user_data));
    // }

    // $user_data = ['role' => $this->user_data->role, 'user_id' => $this->user_data->id];
    // $user_data = ['user_data' => ['role' => 'customer', 'user_id' => '1']];

    // session($user_data);
    // return redirect('/');
});

Route::get('/up', function () {
    // $upload_data = PaymentMethod::insert([
    //     // 'payment_name' => 'transfer bank'
    //     // 'payment_name' => 'e-Wallet'
    //     // 'payment_name' => 'cash'
    // ]);
    // return redirect('/');
});
