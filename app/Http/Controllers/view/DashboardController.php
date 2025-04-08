<?php

namespace App\Http\Controllers\view;
use App\Http\Controllers\Controller;

use App\Models\OrdersModel;

class DashboardController extends Controller
{
    public $orderData = [];
    public function index($params1 = null, $paramsEnd = null)
    {
        $this->orderData = OrdersModel::where('id', $params1)->with(['user', 'package', 'transaction'])->first();
        return view('admin.dashboard', ['params' => $params1, 'paramsEnd' => $paramsEnd, 'orderData' => $this->orderData]);
    }
}
