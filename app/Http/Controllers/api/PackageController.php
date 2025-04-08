<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PackagesModel;

class PackageController extends Controller
{
    public function updatePackage(Request $request)
    {
        $request->validate([
            'package_name' => 'required',
            'price' => 'required'
        ]);

        PackagesModel::where('package_name', $request->input('package_name'))
            ->update(['package_name' => $request->input('package_name'), 'price' => (int) str_replace(',', '', $request->input('price'))]);
        return redirect('/dashboard/packages');

    }
    public function newPackage(Request $request)
    {
        $request->validate([
            'package_name' => 'required',
            'price' => 'required'
        ]);

        PackagesModel::create([
            'package_name' => $request->input('package_name'),
            'price' => (int) $request->input('price')
        ]);
        return redirect('/dashboard/packages');

    }

    public function deletePackage(Request $request)
    {
        PackagesModel::where('id', $request->query('id'))->delete();
        return back();
    }
}
