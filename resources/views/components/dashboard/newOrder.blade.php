<div class="flex items-center justify-center ">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">
        <form class="" action="{{ route('api-new-order') }}" method="POST">
            @csrf

            @if (session()->has('error'))
                <p>{{ session('error') }}</p>
            @endif
            {{-- total berat --}}
            <label class="block mt-4 mb-2 font-medium text-gray-700">Total Berat (Kg)</label>
            <input type="number" name="total_weight"
                class="w-full p-2 border-[1px] rounded-lg focus:ring focus:ring-blue-300"
                placeholder="Masukkan berat pakaian">

            {{-- total items --}}
            <label class="block mt-4 mb-2 font-medium text-gray-700">Jumlah Pakaian</label>
            <input type="number" name="total_items"
                class="w-full p-2 border-[1px] rounded-lg focus:ring focus:ring-blue-300"
                placeholder="Masukkan jumlah pakaian">

            {{-- package --}}
            <label class="block mt-4 mb-2 font-medium text-gray-700">Pilih Paket</label>
            <select name="package" class="w-full p-2 border-[1px] rounded-lg focus:ring focus:ring-blue-300">
                <option value="1">Reguler</option>
                <option value="2">Express</option>
                <option value="3">Ex-Tra</option>
            </select>

            {{-- note --}}
            <label class="block mt-4 mb-2 font-medium text-gray-700">Note</label>
            <textarea name="note" class="w-full p-2 border-[1px] rounded-lg focus:ring focus:ring-blue-300 resize-none h-[100px]"
                placeholder="Masukkan berat pakaian"></textarea>

            <button type="submit"
                class="mt-4 w-full bg-green-500 text-white p-2 rounded-lg hover:bg-green-600">Kirim</button>
        </form>
    </div>
</div>
