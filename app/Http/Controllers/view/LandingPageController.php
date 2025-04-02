<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class LandingPageController extends Controller
{
    public $role;
    public function index()
    {
        $this->role = Cookie::get(key: 'role');
        return view('landingpage', $this->LandingPage());
    }

    public function LandingPage()
    {
        return [
            'values' => [
                [
                    'name' => 'Proses Cepat',
                    'icon' => './assets/icons/time.svg',
                    'text' => 'Pakaian bersih dan rapi dalam waktu singkat! Serahkan cucian Anda kepada kami, dan nikmati hasilnya yang segar dan tersetrika sempurna'
                ],
                [
                    'name' => 'Baju Rapi',
                    'icon' => './assets/icons/Strika.svg',
                    'text' => 'Pakaian bersih dan rapi dalam waktu singkat! Serahkan cucian Anda kepada kami, dan nikmati hasilnya yang segar dan tersetrika sempurna'
                ],
                [
                    'name' => 'Harga Murah',
                    'icon' => './assets/icons/money.svg',
                    'text' => 'Pakaian selalu rapi tanpa perlu repot! Layanan setrika profesional dengan harga hemat di kantong'
                ],
                [
                    'name' => 'Pakaian Bersih',
                    'icon' => './assets/icons/clothes.svg',
                    'text' => 'Pakaian bersih, rapi, dan bebas noda untuk tampilan yang selalu sempurna! '
                ],
                [
                    'name' => 'Pengiriman Cepat',
                    'icon' => './assets/icons/delivery.svg',
                    'text' => 'Pakaian bersih, rapi, dan bebas noda untuk tampilan yang selalu sempurna! '
                ],
                [
                    'name' => 'Baju Wangi',
                    'icon' => './assets/icons/perfume.svg',
                    'text' => 'Pakaian Wangi, rapi, dan bebas bau tidak sedap untuk tampilan yang selalu sempurna! '
                ]
            ],
            'footer' => [
                'description' => 'Atelier Laundry adalah layanan laundry profesional yang menawarkan pencucian, pengeringan, dan penyetrikaan pakaian. Kami menggunakan deterjen berkualitas tinggi menjaga kebersihan dan keawetan pakaian pelanggan',
                'social' => [
                    ['name' => 'Instagram', 'icon' => './assets/icons/socials/instagram.svg'],
                    ['name' => 'Facebook', 'icon' => './assets/icons/socials/facebook.svg'],
                    ['name' => 'X', 'icon' => './assets/icons/socials/x.svg'],
                ],
                'contact' => ['Jl. AmbaRuwo No 7, Badung, Bali.', '0858584681007', 'AtelierLaundry@gmail.com'],
                'menus' => [
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
                ]
            ],
            'role' => $this->role
        ];
    }
}
