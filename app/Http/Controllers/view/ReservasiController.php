<?php

namespace App\Http\Controllers\view;

use App\Http\Controllers\Controller;
use App\Models\PackagesModel;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function index()
    {
        $package_data = PackagesModel::all();
        return view('customer.reservasi', ['package_data' => $package_data]);
    }
}
