<x-layout.layout>
    <div class="min-h-screen bg-white flex items-center justify-center px-4">
        <div class="bg-white text-green-800 w-full max-w-md p-8 rounded-2xl shadow-xl border border-green-300">
            <h1 class="text-3xl font-bold text-center mb-6">🧺 Reservasi Laundry</h1>

            <form action="" method="POST" class="space-y-6">
                @csrf
                {{-- jangan dulu isi actionnya  --}}


                <!-- Total Pakaian -->
                <div>
                    <label for="total_pakaian" class="block text-sm font-semibold mb-1">Total pakaian</label>
                    <input type="text" id="total_pakaian" name="total_pakaian"
                        class="w-full px-4 py-2 bg-green-50 text-green-900 rounded-lg border border-green-300 focus:outline-none focus:ring-2 focus:ring-green-500"
                        placeholder="Masukkan jumlah pakaian">
                </div>

                <!-- Paket Pilihan -->
                <div>
                    <label for="paket" class="block text-sm font-semibold mb-1">Paket</label>
                    <select name="paket" id="paket"
                        class="w-full px-4 py-2 bg-green-50 text-green-900 rounded-lg border border-green-300 focus:outline-none focus:ring-2 focus:ring-green-500">
                        <option value="" disabled selected>Pilih paket</option>
                        <option value="Reguler">Reguler</option>
                        <option value="Express">Express</option>
                        <option value="EX-Tra">EX-Tra</option>
                    </select>
                </div>


                <!-- Estimasi -->
                <div class="text-sm text-green-700">
                    Estimasi biaya (200 gram/1 item):
                    <span class="font-bold">1224</span>
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
</x-layout.layout>

{{-- full item gitu 😂😂 --}}

<!-- apalagi ?? yang perlu dibuat
 oiya sur di login tu kan ada eh bentar di wa aja ya-->

{{-- udh lumayan  --}}
