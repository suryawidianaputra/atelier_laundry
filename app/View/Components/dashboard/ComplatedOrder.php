<?php

namespace App\View\Components\dashboard;

use App\Models\OrdersModel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ComplatedOrder extends Component
{
    public $orders;
    public function __construct($orders = [])
    {
        $this->orders = OrdersModel::where('order_status', 'finish')->with(['user', 'package'])->latest()->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.complated-order', ['orders' => $this->orders]);
    }
}
