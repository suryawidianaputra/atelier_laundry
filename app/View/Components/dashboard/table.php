<?php

namespace App\View\Components\dashboard;

use Closure;
use App\Models\OrdersModel;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class table extends Component
{
    /**
     * Create a new component instance.
     */

    public $orders;
    public function __construct($orders = [])
    {
        $this->orders = OrdersModel::where('order_status', '!=', 'finish')->with(['user', 'package'])->latest()->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        return view('components.dashboard.table', ['orders' => $this->orders]);
    }
}
