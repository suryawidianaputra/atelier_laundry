<?php

namespace App\Http\Controllers\view;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class DashboardController extends Controller
{
    public function index($params1 = null, $paramsEnd = null)
    {
        $order_data = [];
        return view('admin.dashboard', ['params' => $params1, 'order_data' => $order_data, 'paramsEnd' => $paramsEnd]);
    }
}
