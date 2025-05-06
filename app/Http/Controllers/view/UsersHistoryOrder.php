<?php

namespace App\Http\Controllers\view;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersHistoryOrder extends Controller
{
    public function index()
    {
        return view('customer.orderHistory');
    }
}
