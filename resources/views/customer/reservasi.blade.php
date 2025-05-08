<x-layout.layout>
    <div class="fixed w-full">
        <x-navbar></x-navbar>
    </div>

    <div class="min-h-screen bg-gray-300 flex items-center justify-center px-4">
        <div class="bg-white text-green-800 w-full max-w-md p-8 rounded-2xl shadow-xl border border-green-300">
            <h1 class="text-3xl font-bold text-center mb-6">🧺 Reservasi Laundry</h1>

            <form action="{{ route('api-reservasi') }}" method="POST" class="space-y-6">
                @csrf
                <!-- Total Pakaian -->
                <div>
                    <label for="total_pakaian" class="block text-sm font-semibold mb-1">Total pakaian</label>
                    <input type="text" id="total_pakaian" name="total_item"
                        class="w-full px-4 py-2 bg-green-50 text-green-900 rounded-lg border border-green-300 focus:outline-none focus:ring-2 focus:ring-green-500"
                        placeholder="Masukkan jumlah pakaian">
                </div>

                <!-- Paket Pilihan -->
                <div>
                    <label for="paket" class="block text-sm font-semibold mb-1">Paket</label>
                    <select name="package_id" id="paket"
                        class="w-full px-4 py-2 bg-green-50 text-green-900 rounded-lg border border-green-300 focus:outline-none focus:ring-2 focus:ring-green-500">
                        @foreach ($package_data as $package)
                            <option value="{{ $package['id'] }}">{{ $package['package_name'] }} |
                                Rp{{ number_format($package['price']) }}/kg</option>
                        @endforeach
                    </select>
                </div>

                <!-- Tombol -->
                <div class="pt-2">
                    <button type="submit"
                        class="w-full py-2 px-4 rounded-xl bg-green-600 hover:bg-green-700 text-white font-semibold transition">
                        Reservasi
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div
        class="fixed inset-0 bg-black/60 flex justify-center items-center z-50 {{ !session('success') ? 'hidden' : '' }}">
        <div class="bg-white w-[320px] max-w-[90%] rounded-2xl shadow-2xl p-6 text-center animate-fade-in">
            <div class="flex items-center justify-center mb-4">
                <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <h1 class="text-lg font-semibold text-gray-800 mb-2">
                Reservasi telah berhasil
            </h1>
            <p class="text-sm text-gray-600 mb-6">
                Harap membawa pakaian ke laundry
            </p>
            <button
                class="bg-green-500 hover:bg-green-600 transition duration-200 text-white py-2 px-6 rounded-md shadow"
                id="success">
                Kembali
            </button>
        </div>
    </div>

    <script>
        document.getElementById("success").addEventListener("click", () => {
            window.location.href = '/'
        })
    </script>
</x-layout.layout>
