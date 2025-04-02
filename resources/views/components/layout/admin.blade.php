<x-layout.layout>
    <div class="flex h-screen ">
        <!-- Sidebar -->
        <div id="sidebar"
            class="fixed inset-y-0 left-0 w-64 bg-blue-600 text-white transform -translate-x-full sm:translate-x-0 sm:relative sm:flex flex-col transition-transform duration-300 ease-in-out">
            <div class="p-4 text-lg font-semibold flex justify-between items-center">
                <span>Dashboard</span>
                <button id="closeSidebar" class="sm:hidden text-white text-xl">&times;</button>
            </div>
            <nav class="flex-1 px-4 py-2">
                @foreach ($nav_links as $data)
                    <a href="/dashboard/{{ $data['path'] }}"
                        class="block py-2 px-4 rounded hover:bg-blue-700 my-2">{{ $data['name'] }}</a>
                @endforeach
            </nav>
        </div>

        <!-- Content -->
        <div class="flex-1 flex flex-col overflow-y-scroll">
            <!-- Navbar -->
            <div class="bg-white shadow p-4 flex items-center">
                <button id="menuBtn" class="sm:hidden text-blue-900 focus:outline-none">
                    &#9776;
                </button>
                <h1 class="text-xl font-semibold ml-4">Dashboard</h1>
            </div>

            <!-- Main Content -->
            <div class="px-2">
                {{ $slot }}
            </div>
        </div>
    </div>
</x-layout.layout>

<script>
    const menuBtn = document.getElementById('menuBtn');
    const sidebar = document.getElementById('sidebar');

    menuBtn.addEventListener('click', () => {
        sidebar.classList.toggle('-translate-x-full');
    });
    closeSidebar.addEventListener('click', () => {
        sidebar.classList.add('-translate-x-full');
    });
</script>
