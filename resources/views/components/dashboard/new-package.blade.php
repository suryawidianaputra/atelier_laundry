<div class="max-w-3xl mx-auto p-6 bg-white rounded-2xl shadow-md space-y-6">
    <form action="{{ route('api-new-package') }}" method="POST" class="space-y-6">
        @csrf

        <h2 class="text-2xl font-bold text-gray-800 text-center">Paket Baru</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            {{-- Nama Paket --}}
            <div class="flex flex-col">
                <label class="text-sm text-gray-500 mb-1">Nama Paket</label>
                <input type="text" name="package_name"
                    class="border border-gray-300 rounded-lg px-3 py-2 bg-transparent text-gray-800 w-full">
            </div>

            {{-- Harga per Kg --}}
            <div class="flex flex-col">
                <label class="text-sm text-gray-500 mb-1">Harga/kg</label>
                <div class="border border-gray-300 rounded-lg px-3 py-2">
                    <input type="text" name="price" class="w-full border-0 outline-0 bg-transparent text-gray-800">
                </div>
            </div>

            {{-- Tombol Submit --}}
            <div class="col-span-2">
                <button type="submit"
                    class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition w-full">
                    Buat
                </button>
            </div>

            {{-- Tombol Kembali --}}
            <div class="col-span-2">
                <div class="bg-red-500 text-white px-6 py-2 rounded-lg hover:bg-red-600 transition text-center cursor-pointer w-full"
                    onclick="window.history.back()">
                    Kembali
                </div>
            </div>
        </div>
    </form>
</div>
