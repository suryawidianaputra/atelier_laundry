{{-- @dd($orders->package) --}}

<div class="overflow-x-auto rounded-xl shadow-md bg-white">
    <div class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 w-max m-2">
        <a href="/dashboard/new-order">Add New Order</a>
    </div>
    <table class="min-w-full table-auto">
        <thead class="bg-gradient-to-r from-green-400 to-green-600 text-black text-sm uppercase border-b-2">
            <tr>
                <th class="px-6 py-3 text-center">No.</th>
                <th class="px-6 py-3 text-center">Username</th>
                <th class="px-6 py-3 text-center">Status Order</th>
                <th class="px-6 py-3 text-center">Paket</th>
                <th class="px-6 py-3 text-center">Total Harga</th>
                <th class="px-6 py-3 text-center">Waktu</th>
                <th class="px-6 py-3 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            @if (count($orders) !== 0)
                @foreach ($orders as $i => $order)
                    <tr
                        class="{{ $i % 2 === 0 ? 'bg-gray-50' : 'bg-white' }} hover:bg-green-50 transition duration-200">
                        <td class="px-6 py-3 text-center font-medium text-gray-800">{{ $i + 1 }}</td>
                        <td
                            class="px-6 py-3 text-center font-semibold {{ $order->user->role == 'admin' ? 'text-red-500' : 'text-green-600' }}">
                            {{ $order->user->role == 'admin' ? Str::ucfirst('admin') : $order->user->username }}
                        </td>
                        <td class="px-6 py-3 text-center">
                            <span
                                class="inline-block px-3 py-1 rounded-full bg-emerald-100 text-emerald-600 text-sm font-semibold">
                                {{ Str::ucfirst($order->order_status) }}
                            </span>
                        </td>
                        <td class="px-6 py-3 text-center text-indigo-500 font-medium">
                            {{ $order->package->package_name }}
                        </td>
                        <td class="px-6 py-3 text-center font-bold text-gray-900">
                            Rp{{ number_format($order->total_amount, 0, ',', '.') }}
                        </td>
                        <td>
                            <span>{{ $order->created_at->diffForHumans() }}</span>
                        </td>
                        <td class="px-6 py-3 text-center">
                            <a href="{{ route('dashboard', [$order->id, 'detail-order']) }}"
                                class="inline-block bg-green-500 hover:bg-green-600 text-white text-sm font-semibold py-1.5 px-4 rounded-md shadow-sm transition">
                                Edit
                            </a>
                        </td>
                    </tr>
                @endforeach
            @else
                <td class="text-center p-2" colspan="7">Tidak ada data</td>
            @endif
        </tbody>
    </table>
</div>
