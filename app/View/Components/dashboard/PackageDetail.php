<?php

namespace App\View\Components\dashboard;

use App\Models\PackagesModel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PackageDetail extends Component
{
    /**
     * Create a new component instance.
     */
    public $packageName;
    public function __construct($package)
    {
        $this->packageName = PackagesModel::where('package_name', $package)->first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.package-detail', ['packageData' => $this->packageName]);
    }
}
