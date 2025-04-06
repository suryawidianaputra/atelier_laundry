<?php

namespace App\Http\Controllers;

use App\Mail\OTPMail;
use App\Models\AuthModel;
use Illuminate\Http\Request;
use App\Models\UsersModel;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    private $user_data;
    public function Login()
    {
        return view('auth.login');
    }
    public function Register()
    {
        return view('auth.register');
    }

    public function HandleLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email|string|max:255',
            'password' => 'required|string|max:255',
        ]);

        $remember = $request->has('remember');

        $user_data = UsersModel::where('email', '=', $request->input('email'))->first();
        if ($user_data === null) {
            return back()->with('error', 'Account Not Found');
        }

        if (!Hash::check($request->input('password'), $user_data->password)) {
            return back()->with('error', 'Password does not match');
        }

        $session_data = ['role' => $user_data->role, 'user_id' => $user_data->id];

        if ($remember) {
            Cookie::queue(Cookie::make('user_data', json_encode($session_data), 60 * 24 * 30));
        }

        session(['user_data' => $session_data]);

        return redirect($user_data->role == 'admin' ? 'dashboard' : '/');
    }

    public function hanldeRegister(Request $request)
    {
        if (strlen($request->input('password')) < 8) {
            return back()->with('error', 'Password must be more then 7 characters long');
        }

        $request->validate([
            'username' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
            'address' => 'required|string',
            'phone_number' => 'required|string|max:15'
        ]);

        $remember = $request->has('remember');

        if (UsersModel::where('email', $request->input('email'))->exists()) {
            return back()->with('error', 'Email is already used');
        }

        if (UsersModel::where('phone_number', $request->input('phone_number'))->exists()) {
            return back()->with('error', 'Phone number is already used');
        }

        $upload_data = UsersModel::create([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'address' => $request->input('address'),
            'phone_number' => $request->input('phone_number')
        ])->refresh();

        $user_data = ['user_id' => $upload_data->id, 'role' => $upload_data->role];

        if ($remember) {
            AuthModel::setCookie('user_data', json_encode($user_data));
        }

        session(['user_data' => $user_data]);
        return redirect('/');
    }

    // public function verifyOTP(Request $request)
    // {
    //     $user_data = json_decode(Cookie::get('user_data'), true);

    //     $request->validate([
    //         'action' => 'required',
    //         'otp_code' => 'required|digits:6'
    //     ]);

    //     return;
    // }

    // public function GenerateOTP()
    // {
    //     $user_data = json_decode(Cookie::get('user_data'), true);
    //     $generateOTP = rand(100000, 999999);
    //     Cookie::queue(Cookie::make('otp_code', $generateOTP), 5);
    //     Mail::to($user_data['email'])->send(new OTPMail($generateOTP, $user_data['username']));
    //     return;
    // }
}
