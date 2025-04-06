<?php

namespace App\Http\Controllers\view;
use App\Http\Controllers\Controller;

use App\Models\OrdersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class DashboardController extends Controller
{
    public function index($params1 = null, $paramsEnd = null)
    {
        return view('admin.dashboard', ['params' => $params1, 'paramsEnd' => $paramsEnd]);
    }
}
