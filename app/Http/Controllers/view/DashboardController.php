<?php

namespace App\Http\Controllers\view;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class DashboardController extends Controller
{
    public function index($params = null)
    {
        return view('dashboard', ['params' => $params]);
    }
}
