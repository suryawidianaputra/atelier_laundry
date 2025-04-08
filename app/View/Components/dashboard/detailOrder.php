<?php

namespace App\View\Components\dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\OrdersModel;
use App\Models\PackagesModel;
use App\Models\PaymentMethod;

class detailOrder extends Component
{
    /**
     * Create a new component instance.
     */
    public $order_data;
    public $order_id;
    public $package_data;
    public $payment_method;
    public function __construct($orderData)
    {
        // $this->order_data = OrdersModel::where('id', $orderId)->first();
        $this->order_data = $orderData;
        // OrdersModel::with(['user', 'package', 'transaction'])->first();
        $this->package_data = PackagesModel::all();
        $this->payment_method = PaymentMethod::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.detail-order', ['orderData' => $this->order_data, 'packageDatas' => $this->package_data, 'paymentMethod' => $this->payment_method]);
    }
}
