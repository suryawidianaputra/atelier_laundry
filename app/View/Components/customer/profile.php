<?php

namespace App\View\Components\customer;

use App\Models\AuthModel;
use App\Models\UsersModel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class profile extends Component
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

        $sessionData = AuthModel::CheckSession()['data']['user_id'];
        $userData = UsersModel::where('id', $sessionData)->first();
        return view('components.customer.profile', ['user_data' => $userData]);
    }
}
