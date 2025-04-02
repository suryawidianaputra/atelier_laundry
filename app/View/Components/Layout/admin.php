<?php

namespace App\View\Components\Layout;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class admin extends Component
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
        return view('components.layout.admin', ['navLinks' => $this->nav_links()]);
    }

    public function nav_links()
    {
        return [
            [
                'name' => 'dashboard',
                'path' => ''
            ],
            [
                'name' => 'New Order',
                'path' => 'new-order'
            ],
            [
                'name' => 'Complated',
                'path' => 'order-complated'
            ]
        ];
    }
}
