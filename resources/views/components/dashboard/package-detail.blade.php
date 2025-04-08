<div class="max-w-2xl mx-auto p-6 bg-white rounded-2xl shadow-md space-y-6">
    <form action="{{ route('api-update-package') }}" method="POST" class="space-y-6">
        @csrf

        <h2 class="text-2xl font-bold text-gray-800 text-center mb-4">Detail Paket</h2>

        <div class="grid grid-cols-2 gap-4">
            {{-- Nama Paket --}}
            <div class="col-span-2 sm:col-span-1 flex flex-col">
                <label class="text-sm text-gray-500 mb-1">Nama Paket</label>
                <input type="text" name="package_name" value="{{ $packageData->package_name }}"
                    class="border border-gray-300 rounded-lg px-3 py-2 bg-transparent text-gray-800 w-full">
            </div>

            {{-- Harga per Kg --}}
            <div class="col-span-2 sm:col-span-1 flex flex-col">
                <label class="text-sm text-gray-500 mb-1">Harga / kg</label>
                <div class="border border-gray-300 rounded-lg px-3 py-2">
                    <input type="text" name="price" value="{{ number_format($packageData->price) }}"
                        class="w-full bg-transparent outline-none border-none text-gray-800">
                </div>
            </div>

            {{-- Tombol Update --}}
            <div class="col-span-2">
                <button type="submit"
                    class="bg-green-500 text-white px-6 py-2 w-full rounded-lg hover:bg-green-600 transition">
                    Update
                </button>
            </div>

            {{-- Tombol Kembali --}}
            <div class="col-span-2 sm:col-span-1">
                <div class="bg-gray-500 text-white px-6 py-2 w-full text-center rounded-lg hover:bg-gray-600 transition cursor-pointer"
                    onclick="window.history.back()">
                    Kembali
                </div>
            </div>

            {{-- Tombol Hapus --}}
            <div class="col-span-2 sm:col-span-1">
                <div class="bg-red-500 text-white px-6 py-2 w-full text-center rounded-lg hover:bg-red-600 transition cursor-pointer"
                    onclick="window.location.href = '{{ route('api-delete-package', ['id' => $packageData->id]) }}'">
                    Hapus
                </div>
            </div>
        </div>
    </form>
</div>
