<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $fillable = ['username', 'email', 'password', 'address', 'phone_number'];
}
