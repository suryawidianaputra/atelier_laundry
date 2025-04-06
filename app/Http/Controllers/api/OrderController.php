<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\AuthModel;
use App\Models\OrdersModel;
use App\Models\PackagesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class OrderController extends Controller
{
    public function CreateOrder(Request $request)
    {

        $request->validate([
            'total_weight' => 'required',
            'total_items' => 'required',
            'package' => 'required',
        ]);
        $package_data = PackagesModel::where('package_name', '=', Str::ucfirst($request->input('package')))->first();

        if (!$package_data) {
            return back()->with('error', 'Package not found');
        }
        $user_data = AuthModel::CheckSession()['data']['user_id'];

        OrdersModel::create([
            'user_id' => $user_data,
            'total_weight' => $request->input('total_weight'),
            'total_items' => $request->input('total_items'),
            'package_id' => $package_data->id,
            'total_amount' => $request->input('total_weight') * $package_data->price,
            'note' => $request->input('note', null)
        ]);

        return back()->with('success', 'Order created successfully');
    }

    public function GetOrderByUserId(Request $request)
    {

    }
    public function GetOrderByOrderId(Request $request)
    {

    }
}
