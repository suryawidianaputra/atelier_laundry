<div class="max-w-3xl mx-auto p-6 bg-white rounded-2xl shadow-md space-y-6">
    <h2 class="text-2xl font-bold text-gray-800">Detail Order</h2>

    <form action="{{ route('api-update-order') }}" method="POST" class="space-y-4">
        @csrf
        <div class="grid grid-cols-2 gap-4">
            {{-- Nama --}}
            <div class="flex flex-col">
                <label class="text-sm text-gray-500 mb-1">Nama</label>
                <input type="text"
                    value="{{ $orderData->user->role == 'admin' ? Str::ucfirst('admin') : $order->user->username }}"
                    class="border border-gray-300 rounded-lg px-3 py-2 bg-gray-100 text-gray-800" readonly>
            </div>

            {{-- Total Berat --}}
            <div class="flex flex-col">
                <label class="text-sm text-gray-500 mb-1">Total Berat</label>
                <div class="flex border-gray-300 border rounded-lg px-3 py-2">
                    <input type="number" value="{{ $orderData->total_weight }}"
                        class=" border-0 outline-0 bg-transparent text-gray-800" name="total_weight">
                    <span>Kg</span>
                </div>
            </div>

            {{-- Total Item --}}
            <div class="flex flex-col">
                <label class="text-sm text-gray-500 mb-1">Total Item</label>
                <input type="text" value="{{ $orderData->total_items }}"
                    class="border border-gray-300 rounded-lg px-3 py-2 bg-gray-100 text-gray-800" name="total_items">
            </div>

            {{-- Total Harga --}}
            <div class="flex flex-col">
                <label class="text-sm text-gray-500 mb-1">Total Harga</label>
                <div class="flex items-center border border-gray-300 rounded-lg bg-gray-100 px-3 py-2">
                    <span class="text-gray-700 mr-1">Rp</span>
                    <input type="text"
                        value="{{ number_format($orderData->total_weight * $orderData->package->price) }}"
                        class="bg-transparent w-full outline-none text-gray-800" readonly name="total_amount">
                </div>
            </div>

            {{-- Waktu --}}
            <div class="flex flex-col col-span-2">
                <label class="text-sm text-gray-500 mb-1">Waktu</label>
                <input type="text" value="{{ $orderData->created_at->diffForHumans() }}"
                    class="border border-gray-300 rounded-lg px-3 py-2 bg-gray-100 text-gray-800" readonly>
            </div>
        </div>

        <input name="order_id" type="text" value="{{ $orderData->id }}" hidden>
        <input name="transaction_id" type="text" value="{{ $orderData->transaction->id }}" hidden>
        {{-- payment status --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Payment Status</label>
            <select name="payment_status" class="w-full border-gray-300 rounded-lg border-2  shadow-sm p-2">
                <option value="waiting" {{ $orderData->transaction->payment_method == 'waiting' ? 'selected' : '' }}>
                    Waiting
                </option>
                <option value="paid" {{ $orderData->transaction->payment_method !== 'waiting' ? 'selected' : '' }}>
                    Paid
                </option>
            </select>
        </div>

        {{-- payment method --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Payment Method</label>
            <select name="payment_method" class="w-full border-gray-300 rounded-lg border-2  shadow-sm p-2">
                <option value="null" {{ $orderData->transaction->payment_method === 'waiting' ?? 'selected' }}>
                    Waiting
                </option>
                @foreach ($paymentMethod as $method)
                    <option value="{{ $method['payment_name'] == 'e-Wallet' ? 'e_Wallet' : $method['payment_name'] }}"
                        {{ $method['payment_name'] === $orderData->transaction->payment_method ? 'selected' : '' }}>
                        {{ Str::ucfirst($method['payment_name']) }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- status order --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Status Order</label>
            <select name="order_status" class="w-full border-gray-300 rounded-lg border-2  shadow-sm p-2">
                <option value="waiting" {{ $orderData->order_status === 'waiting' ? 'selected' : '' }}>Waiting</option>
                <option value="process" {{ $orderData->order_status === 'process' ? 'selected' : '' }}>Process</option>
                <option value="finish" {{ $orderData->order_status === 'finish' ? 'selected' : '' }}>Finish</option>
            </select>
        </div>

        {{-- paket --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Paket</label>
            <select name="package_id" class="w-full border-gray-300 rounded-lg border-2 shadow-sm p-2">
                @foreach ($packageDatas as $data)
                    <option value="{{ $data['id'] }}" {{ $data['id'] == $orderData->package_id ? 'selected' : '' }}>
                        {{ Str::ucfirst($data['package_name']) }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <div class="border-2 border-gray-300 p-2 rounded-[10px] h-[100px]">
                <label class="block text-sm font-medium text-gray-700 mb-1">Catatan:</label>
                <textarea class="w-full resize-none border-none outline-0" name="note">{{ $orderData->note }}</textarea>
            </div>
        </div>

        <div class="text-right">
            <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition">
                Update Order
            </button>
        </div>
    </form>
    <div class="text-right">
        <button type="submit" class="bg-red-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition"
            onclick="window.history.back()">
            Kembali
        </button>
    </div>
</div>
