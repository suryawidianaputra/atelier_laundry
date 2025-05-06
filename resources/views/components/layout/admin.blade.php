<x-layout.layout>
    <div class="flex h-screen ">
        <!-- Sidebar -->
        <div id="sidebar"
            class="fixed inset-y-0 left-0 w-64 bg-green-600 text-white transform -translate-x-full sm:translate-x-0 sm:relative sm:flex flex-col transition-transform duration-300 ease-in-out">
            <div class="w-full flex justify-end p-2">
                <button id="closeSidebar" class="sm:hidden text-white text-2xl">&times;</button>
            </div>
            <div class="p-4 text-lg font-semibold flex flex-col items-center">
                <img src="{{ asset('assets/icons/logo.svg') }}" alt="Laundry Icon" class="w-30 h-30">
                <p class="text-white text-xl">Atelier Laundry</p>
            </div>

            <nav class="flex-1 px-4 py-2 mt-4 border-t-2 border-white">
                @foreach ($nav_links as $data)
                    <a href="/dashboard/{{ $data['path'] }}"
                        class="flex items-center py-2 px-4 rounded hover:bg-green-700 my-2 text-white">
                        <img src="{{ asset($data['icon']) }}" alt="icon" class="w-6 h-6 object-contain mr-3">
                        <p class="m-0">{{ $data['name'] }}</p>
                    </a>
                @endforeach
            </nav>
        </div>

        <!-- Content -->
        <div class="flex-1 flex flex-col overflow-y-scroll">
            <!-- Navbar -->
            <div class="bg-white shadow py-4 px-5 flex items-center justify-between">
                <button id="menuBtn" class="sm:hidden text-blue-900 focus:outline-none">
                    &#9776;
                </button>
                <h1 class="text-xl font-semibold ml-4">Dashboard</h1>
                <div class="flex pr-5 items-center">
                    <h1 class="text-[18px]">{{ $username }}</h1>
                    <div class="rotate-[-45deg]">
                        <img src="{{ asset('assets/icons/left_arrow.svg') }}" alt=""
                            class="h-[20px] px-2 cursor-pointer" id="showUserOptions">
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="px-2">
                {{ $slot }}
            </div>
        </div>
    </div>

    {{-- show options --}}
    <div class="absolute w-[180px] h-[220px] bg-green-500 shadow-2xl top-14 right-5 hidden rounded-xl" id="UserOptions">
        <div class="p-3">
            <div class="w-full flex items-center flex-col pb-2 mb-4 border-b-2 border-white">
                <img src="{{ asset('assets/icons/account.svg') }}" alt=""
                    class="w-[60px] border-2 border-white rounded-full p-2">
                <p class="text-white pt-0.5 text-[18px]">{{ $username }}</p>
            </div>
            <div class="">
                <a href="/logout" class="flex group">
                    <img src="{{ asset('assets/icons/gear.svg') }}" alt=""
                        class="w-[20px] rounded-full group-hover:rotate-180 duration-1000 group-hover:scale-[110%]">
                    <p class="text-white p-1 hover:underline">Setting</p>
                </a>
                <div class="flex mt-3">
                    <img src="{{ asset('assets/icons/logout.svg') }}" alt="" class="w-[25px]">
                    <a href="" class="text-white pl-1">Logout</a>
                </div>
            </div>
        </div>
    </div>
</x-layout.layout>

{{-- userOptions --}}


<script>
    const menuBtn = document.getElementById('menuBtn');
    const sidebar = document.getElementById('sidebar');

    menuBtn.addEventListener('click', () => {
        sidebar.classList.toggle('-translate-x-full');
    });
    closeSidebar.addEventListener('click', () => {
        sidebar.classList.add('-translate-x-full');
    });

    const arrow = document.getElementById('showUserOptions')
    arrow.addEventListener('click', () => {
        arrow.classList.toggle('rotate-90')
        document.getElementById('UserOptions').classList.toggle('hidden')
    })
</script>
