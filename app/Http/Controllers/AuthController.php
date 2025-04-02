<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersModel;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

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
        if ($this->user_data === 0) {
            return back()->with('error', 'Account Not Found');
        }
        if (!Hash::check($request->input('password'), $this->user_data->password)) {
            return back()->with('error', 'Password does not match');
        }

        $user_data = ['role' => $this->user_data->role, 'user_id' => $this->user_data->id];
        if ($remember) {
            Cookie::queue(Cookie::make('user_data', json_encode($user_data)));
        }

        session(['user_data' => $user_data]);

        return redirect('/');
    }
}
