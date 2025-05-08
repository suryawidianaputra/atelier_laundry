<?php

namespace App\View\Components\customer;

use App\Models\AuthModel;
use App\Models\OrdersModel;
use App\Models\PackagesModel;
use App\Models\UsersModel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class history extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $sessionData = AuthModel::CheckSession()['data']['user_id'];
        $userData = OrdersModel::where('user_id', $sessionData)->get();
        $package = PackagesModel::all();
        return view('components.customer.history', ['order_data' => $userData, 'package' => $package]);
    }
}
