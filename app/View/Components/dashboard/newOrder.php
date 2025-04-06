<?php

namespace App\View\Components\dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class newOrder extends Component
{
  /**
   * Create a new component instance.
   */
  public $order_data;
  public function __construct($order_data = [])
  {
    $this->order_data = $order_data;
  }

  /**
   * Get the view / contents that represent the component.
   */
  public function render(): View|Closure|string
  {
    return view('components.dashboard.newOrder', ['order_data' => $this->order_data]);
  }
}