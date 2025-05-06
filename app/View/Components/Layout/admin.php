<?php

namespace App\View\Components\Layout;

use Closure;
use App\Models\AuthModel;
use App\Models\UsersModel;
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
        // AuthModel::CheckSession()['data'];
        $user_id = AuthModel::CheckSession()['data']['user_id'];
        $user_data = UsersModel::where('id', $user_id)->value('username') ?? 'User';
        return view('components.layout.admin', ['navLinks' => $this->nav_links(), 'username' => $user_data]);
    }

    public function nav_links()
    {
        return [
            [
                'name' => 'Order',
                'path' => '',
                'icon' => 'assets/icons/order.svg'
            ],
            [
                'name' => 'Package',
                'path' => 'packages',
                'icon' => 'assets/icons/package.svg'
            ],
            [
                'name' => 'Completed',
                'path' => 'order-completed',
                'icon' => 'assets/icons/completed.svg'
            ],
        ];
    }
}
