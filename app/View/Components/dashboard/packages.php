<?php

namespace App\View\Components\dashboard;

use App\Models\PackagesModel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class packages extends Component
{
    /**
     * Create a new component instance.
     */
    public $packageData;
    public function __construct()
    {
        $this->packageData = PackagesModel::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.packages', ['packageData' => $this->packageData]);
    }
}
