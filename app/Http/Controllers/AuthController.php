<?php

namespace App\Http\Controllers;

use App\Mail\OTPMail;
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
            'email' => 'required|string|max:255',
            'password' => 'required|string|max:255',
        ]);

        $remember = $request->has('remember');

        $this->user_data = UsersModel::where('email', '=', $request->input('email'))->first();
        if ($this->user_data === null) {
            return back()->with('error', 'Account Not Found');
        }
        if (!Hash::check($request->input('password'), $this->user_data->password)) {
            return back()->with('error', 'Password does not match');
        }

        $user_data = [
            'user_id' => $this->user_data->email,
            'username' => $this->user_data->username,
            'email' => $this->user_data->email,
            'role' => $this->user_data->role,
            'remember' => $remember,
            'action' => 'login'
        ];

        // Cookie::queue(Cookie::make('user_data', json_encode($user_data)), 5);

        $user_data = ['role' => $this->user_data->role, 'user_id' => $this->user_data->id];
        if ($remember) {
            Cookie::queue(Cookie::make('user_data', json_encode($user_data)));
        }

        session(['user_data' => $user_data]);

        return redirect('/');
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

        $user_data = [
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'remember' => $remember,
            'action' => 'register'
        ];

        // Cookie::queue(Cookie::make('user_data', json_encode($user_data)), 5);

    }

    public function verifyOTP(Request $request)
    {
        $user_data = json_decode(Cookie::get('user_data'), true);

        $request->validate([
            'action' => 'required',
            'otp_code' => 'required|digits:6'
        ]);

        return;
    }

    public function GenerateOTP()
    {
        $user_data = json_decode(Cookie::get('user_data'), true);
        $generateOTP = rand(100000, 999999);
        Cookie::queue(Cookie::make('otp_code', $generateOTP), 5);
        Mail::to($user_data['email'])->send(new OTPMail($generateOTP, $user_data['username']));
        return;
    }
}
