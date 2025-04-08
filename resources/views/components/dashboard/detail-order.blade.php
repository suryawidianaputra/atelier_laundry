<div class="max-w-3xl mx-auto p-6 bg-white rounded-2xl shadow-md space-y-6">
    <h2 class="text-2xl font-bold text-gray-800 text-center">Detail Order</h2>

    <form action="{{ route('api-update-order') }}" method="POST" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
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
                <div class="flex items-center border border-gray-300 rounded-lg px-3 py-2">
                    <input type="number" value="{{ $orderData->total_weight }}"
                        class="w-full border-0 outline-none bg-transparent text-gray-800" name="total_weight">
                    <span class="ml-2 text-gray-600">Kg</span>
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
            <div class="flex flex-col md:col-span-2">
                <label class="text-sm text-gray-500 mb-1">Waktu</label>
                <input type="text" value="{{ $orderData->created_at->diffForHumans() }}"
                    class="border border-gray-300 rounded-lg px-3 py-2 bg-gray-100 text-gray-800" readonly>
            </div>
        </div>

        {{-- Hidden Inputs --}}
        <input name="order_id" type="hidden" value="{{ $orderData->id }}">
        <input name="transaction_id" type="hidden" value="{{ $orderData->transaction->id }}">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            {{-- Payment Status --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Payment Status</label>
                <select name="payment_status" class="w-full border border-gray-300 rounded-lg shadow-sm px-3 py-2">
                    <option value="waiting"
                        {{ $orderData->transaction->payment_status == 'waiting' ? 'selected' : '' }}>
                        Waiting
                    </option>
                    <option value="paid" {{ $orderData->transaction->payment_status == 'paid' ? 'selected' : '' }}>
                        Paid
                    </option>
                </select>
            </div>

            {{-- Payment Method --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Payment Method</label>
                <select name="payment_method" class="w-full border border-gray-300 rounded-lg shadow-sm px-3 py-2">
                    <option value="null"
                        {{ $orderData->transaction->payment_method === 'waiting' ? 'selected' : '' }}>
                        Waiting
                    </option>
                    @foreach ($paymentMethod as $method)
                        <option
                            value="{{ $method['payment_name'] == 'e-Wallet' ? 'e_Wallet' : $method['payment_name'] }}"
                            {{ $method['payment_name'] === $orderData->transaction->payment_method ? 'selected' : '' }}>
                            {{ Str::ucfirst($method['payment_name']) }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Order Status --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Status Order</label>
                <select name="order_status" class="w-full border border-gray-300 rounded-lg shadow-sm px-3 py-2">
                    <option value="waiting" {{ $orderData->order_status === 'waiting' ? 'selected' : '' }}>Waiting
                    </option>
                    <option value="process" {{ $orderData->order_status === 'process' ? 'selected' : '' }}>Process
                    </option>
                    <option value="finish" {{ $orderData->order_status === 'finish' ? 'selected' : '' }}>Finish
                    </option>
                </select>
            </div>

            {{-- Paket --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Paket</label>
                <select name="package_id" class="w-full border border-gray-300 rounded-lg shadow-sm px-3 py-2">
                    @foreach ($packageDatas as $data)
                        <option value="{{ $data['id'] }}"
                            {{ $data['id'] == $orderData->package_id ? 'selected' : '' }}>
                            {{ Str::ucfirst($data['package_name']) }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- Catatan --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Catatan</label>
            <div class="border-2 border-gray-300 p-2 rounded-xl h-[100px]">
                <textarea class="w-full h-full resize-none border-none outline-none text-gray-800" name="note">{{ $orderData->note }}</textarea>
            </div>
        </div>

        {{-- Buttons --}}
        <div class="flex flex-col sm:flex-row justify-between gap-4 pt-4">
            <button type="submit"
                class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition w-full sm:w-auto">
                Update Order
            </button>
            <div onclick="window.history.back()"
                class="cursor-pointer bg-red-500 text-white px-6 py-2 rounded-lg hover:bg-red-600 transition w-full sm:w-auto text-center">
                Kembali
            </div>
        </div>
    </form>
</div>
