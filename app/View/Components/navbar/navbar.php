<?php

namespace App\View\Components\navbar;

use App\Models\AuthModel;
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
        return view('components.navbar.navbar', ['isLogin' => $this->isLogin, 'navLinks' => $this->navLink()]);
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
                'name' => 'Laundry',
                'url' => '/',
                'icon' => './assets/icons/laundry.svg',

            ],
            [
                'name' => 'Riwayat',
                'url' => '/',
                'icon' => './assets/icons/history.svg',
            ],
            [
                'name' => 'Akun',
                'url' => '/',
                'icon' => './assets/icons/account.svg',
            ],
        ];
    }
}
