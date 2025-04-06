<?php

namespace App\View\Components\dashboard;

use App\Models\OrdersModel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class detail_order extends Component
{
    /**
     * Create a new component instance.
     */
    public $order_data;
    public $order_id;
    public function __construct($orderId)
    {
        $this->order_data = OrdersModel::where('id', '=', $orderId)->first();
        $this->order_id = $orderId;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.detail_order', ['orderData' => $this->order_data]);
    }
}
