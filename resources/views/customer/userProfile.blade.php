<x-layout.layout>
    <div class="shadow-2xl">
        <x-navbar.navbar></x-navbar.navbar>
    </div>

    <div class="min-h-screen bg-gray-100 text-green-900 flex justify-center items-start py-10 px-6">
        <div class="w-full max-w-6xl grid grid-cols-1 md:grid-cols-4 gap-6">
            <!-- Sidebar -->
            <x-customer.profile></x-customer.profile>

            <!-- Konten Utama -->
            <x-customer.history></x-customer.history>
        </div>
    </div>
</x-layout.layout>
