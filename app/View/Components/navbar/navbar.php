<?php

namespace App\View\Components\navbar;

use App\Models\AuthModel;
use App\Models\UsersModel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class navbar extends Component
{
    /**
     * Create a new component instance.
     */

    public $isLogin;
    public function __construct()
    {
        $this->isLogin = AuthModel::CheckSession()['bool'];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $sessionData = AuthModel::CheckSession()['data']['user_id'];

        $userData = UsersModel::where('id', $sessionData)->first();

        return view('components.navbar.navbar', ['isLogin' => $this->isLogin, 'navLinks' => $this->navLink(), 'user_data' => $userData]);
    }

    public function navLink()
    {
        return [
            [
                'name' => 'Beranda',
                'url' => '/',
                'icon' => './assets/icons/home.svg',
            ],
            [
                'name' => 'Reservasi',
                'url' => '/reservasi',
                'icon' => './assets/icons/laundry.svg',

            ],
        ];
    }
}
