<div class="w-full min-h-[70px] shadow-2xl">
    <div class="bg-white h-[70px] w-full flex justify-between items-center px-[6%]">
        {{-- logo --}}
        <div class="flex gap-2">
            <img src="./assets/icons/logo.svg" alt="" class="h-[50px] rounded-[10px]">
        </div>
        {{-- nav links --}}
        <div class="hidden sm:flex gap-4">
            @if ($isLogin)
                @foreach ($navLinks as $navlink)
                    <a href="{{ $navlink['url'] }}" class="text-black font-bold">{{ $navlink['name'] }}</a>
                @endforeach
            @else
                <a href="{{ route('auth_page', ['random_string' => $auth_url['login']]) }}"
                    class="bg-green-500 text-white py-2 px-4 rounded-[5px] w-max">Login</a>
                <a href="{{ route('auth_page', ['random_string' => $auth_url['register']]) }}"
                    class="bg-green-500 text-white py-2 px-4 rounded-[5px] w-max">Register</a>
            @endif
        </div>

        {{-- humberger --}}
        <img src="./assets/icons/menu.svg" alt="" class="sm:hidden w-[35px] cursor-pointer" id="humberger">
    </div>

    <div class="sm:hidden flex flex-col gap-4 w-full bg-white absolute right-0 justify-between items-center z-[9999] pb-2 transition-all duration-700 h-0 overflow-hidden"
        id="nav-link-container">
        <div class="flex flex-col w-full mt-2 h-max gap-1">
            @if ($isLogin)
                @foreach ($navLinks as $i => $navlink)
                    <div
                        class="flex w-full justify-between h-[55px] items-center px-5 cursor-pointer hover:bg-gray-200">
                        <a href="{{ $navlink['url'] }}" class="text-black text-[18px]">{{ $navlink['name'] }}</a>
                        <img src="{{ asset($navlink['icon']) }}" alt="" class="w-[30px]">
                    </div>
                @endforeach
            @else
                <div class="flex flex-col gap-4 w-full justify-center px-5 cursor-pointer mt-5">
                    <a href="{{ route('auth_page', ['random_string' => $auth_url['login']]) }}"
                        class="bg-green-500 text-white py-2 px-4 rounded-[5px] w-max">Login</a>
                    <a href="{{ route('auth_page', ['random_string' => $auth_url['register']]) }}"
                        class="bg-green-500 text-white py-2 px-4 rounded-[5px] w-max">Register</a>
                </div>
            @endif
        </div>
    </div>
</div>

<script>
    const navLink = document.getElementById('nav-link-container')
    const humberger = document.getElementById('humberger')
    let counter = false;

    humberger.addEventListener('click', () => {
        if (counter) {
            navLink.classList.remove('h-0')
            navLink.classList.add('h-[30vh]')
            humberger.setAttribute('src', './assets/icons/close.svg')
        } else {
            navLink.classList.remove('h-[30vh]')
            navLink.classList.add('h-0')
            humberger.setAttribute('src', './assets/icons/menu.svg')
        }
        counter = !counter;
    })
</script>
