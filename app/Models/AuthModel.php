<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;

class AuthModel extends Model
{
    public static function CheckSession()
    {
        return [
            'bool' => session()->has('user_data') &&
                session()->has('user_data.user_id') &&
                session()->has('user_data.role'),
            'data' => session('user_data')
        ];
    }

    public static function CheckCookie()
    {
        $user_data = json_decode(Cookie::get('user_data'), true);
        return [
            'bool' => $user_data['user_id'] && $user_data['role'],
            'data' => $user_data
        ];
    }
}
