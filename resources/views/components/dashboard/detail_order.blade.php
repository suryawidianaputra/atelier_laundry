@dd($orderData)

<div class="max-w-3xl mx-auto p-6 bg-white rounded-2xl shadow-md space-y-6">
    <h2 class="text-2xl font-bold text-gray-800">Detail Order</h2>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <p class="text-sm text-gray-500">Nama</p>
            <h3 class="text-lg font-semibold">Root</h3>
        </div>
        <div>
            <p class="text-sm text-gray-500">Alamat</p>
            <h3 class="text-lg font-semibold">Acumalaka</h3>
        </div>
        <div>
            <p class="text-sm text-gray-500">Total Berat</p>
            <h3 class="text-lg font-semibold">2 Kg</h3>
        </div>
        <div>
            <p class="text-sm text-gray-500">Total Item</p>
            <h3 class="text-lg font-semibold">10</h3>
        </div>
        <div>
            <p class="text-sm text-gray-500">Total Harga</p>
            <h3 class="text-lg font-semibold">Rp 100.000</h3>
        </div>
        <div>
            <p class="text-sm text-gray-500">Payment Status</p>
            <h3 class="text-lg font-semibold">Paid</h3>
        </div>
        <div>
            <p class="text-sm text-gray-500">Metode Pembayaran</p>
            <h3 class="text-lg font-semibold">Transfer Bank</h3>
        </div>
    </div>

    <form action="" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Status Order</label>
            <select name="order_status" class="w-full border-gray-300 rounded-lg border-2  shadow-sm p-2">
                <option value="waiting">Waiting</option>
                <option value="process">Process</option>
                <option value="finish">Finish</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Paket</label>
            <select name="package_id" class="w-full border-gray-300 rounded-lg border-2 shadow-sm p-2">
                <option value="1">Paket Reguler</option>
                <option value="2">Paket Express</option>
                <option value="3">Paket Kilat</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Catatan:</label>
            <p></p>
        </div>

        <div class="text-right">
            <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition">
                Update Order
            </button>
        </div>
    </form>
</div>
