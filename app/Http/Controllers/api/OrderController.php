<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\AuthModel;
use App\Models\OrdersModel;
use App\Models\PackagesModel;
use App\Models\transactionsModel;
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

        $package_data = PackagesModel::where('id', '=', (int) $request->input('package'))->latest()->first();

        if (!$package_data) {
            return back()->with('error', 'Package not found');
        }
        $user_data = AuthModel::CheckSession()['data']['user_id'];

        $order_data = OrdersModel::create([
            'user_id' => $user_data,
            'total_weight' => $request->input('total_weight'),
            'total_items' => $request->input('total_items'),
            'package_id' => $package_data->id,
            'total_amount' => $request->input('total_weight') * $package_data->price,
            'note' => $request->input('note')
        ])->refresh();

        transactionsModel::create(['order_id' => $order_data->id]);

        return redirect('/dashboard')->with('success', 'Order created successfully');
    }

    public function updateOrder(Request $request)
    {
        $request->validate([
            'order_id' => 'required',
            'transaction_id' => 'required',
            'total_weight' => 'required', // order
            'total_items' => 'required', // order
            'total_amount' => 'required', // order
            'order_status' => 'required|string', //order
            'package_id' => 'required|exists:packages,id', //order
            'note' => 'nullable|string', //order
            'payment_status' => 'required|string', //transaction
            'payment_method' => 'required|string', //transaction
        ]);

        OrdersModel::where('id', $request->input('order_id'))->update([
            'total_weight' => $request->input('total_weight'),
            'total_amount' => (int) str_replace(',', '', $request->input('total_amount')),
            'total_items' => $request->input('total_items'),
            'order_status' => $request->input('order_status'),
            'package_id' => $request->input('package_id'),
            'note' => $request->input('note')
        ]);

        transactionsModel::where('id', $request->input('transaction_id'))->update([
            'payment_status' => $request->input('payment_status'),
            'payment_method' => $request->input('payment_method'),
        ]);

        return redirect('/dashboard');
    }
    public function GetOrderByOrderId(Request $request)
    {

    }
}
