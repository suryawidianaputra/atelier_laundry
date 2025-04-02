<div class="flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">
        <form class="">
            <label class="block mb-2 font-medium text-gray-700">Nama Pelanggan</label>
            <input type="text" name="nama_user"
                class="w-full p-2 border-[1px] rounded-lg focus:ring focus:ring-blue-300"
                placeholder="Masukkan nama Anda">

            <label class="block mb-2 font-medium text-gray-700">No Telpon</label>
            <input type="text" name="nama_user"
                class="w-full p-2 border-[1px] rounded-lg focus:ring focus:ring-blue-300"
                placeholder="Masukkan nomor anda">

            <label class="block mt-4 mb-2 font-medium text-gray-700">Total Berat (Kg)</label>
            <input type="number" name="total_berat"
                class="w-full p-2 border-[1px] rounded-lg focus:ring focus:ring-blue-300"
                placeholder="Masukkan berat pakaian">

            <label class="block mt-4 mb-2 font-medium text-gray-700">Jumlah Pakaian</label>
            <input type="number" name="jumlah_pakaian"
                class="w-full p-2 border-[1px] rounded-lg focus:ring focus:ring-blue-300"
                placeholder="Masukkan jumlah pakaian">

            <label class="block mt-4 mb-2 font-medium text-gray-700">Pilih Paket</label>
            <select name="paket" class="w-full p-2 border-[1px] rounded-lg focus:ring focus:ring-blue-300">
                <option value="leguler">Reguler</option>
                <option value="express">Express</option>
                <option value="ex-tra">Ex-Tra</option>
            </select>

            <button type="submit"
                class="mt-4 w-full bg-blue-500 text-white p-2 rounded-lg hover:bg-green-600">Kirim</button>
        </form>
    </div>
</div>
