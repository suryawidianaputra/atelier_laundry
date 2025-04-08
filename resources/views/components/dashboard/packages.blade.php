{{-- @dd($orders->package) --}}

<div class="overflow-x-auto rounded-xl shadow-md bg-white">
    <div class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 w-max m-2">
        <a href="/dashboard/new-package">Add New Package</a>
    </div>
    <table class="min-w-full table-auto">
        <thead class="bg-gradient-to-r from-green-400 to-green-600 text-black text-sm uppercase border-b-2">
            <tr>
                <th class="px-6 py-3 text-center">No.</th>
                <th class="px-6 py-3 text-center">Nama Paket</th>
                <th class="px-6 py-3 text-center">Harga</th>
                <th class="px-6 py-3 text-center">Action</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            @foreach ($packageData as $i => $data)
                <tr class="{{ $i % 2 === 0 ? 'bg-gray-50' : 'bg-white' }} hover:bg-green-50 transition duration-200">
                    <td class="px-6 py-3 text-center font-medium text-gray-800">{{ $i + 1 }}</td>
                    <td>{{ $data['package_name'] }}</td>
                    <td>Rp{{ number_format($data['price']) }}</td>
                    <td class="px-6 py-3 text-center">
                        <a href="{{ route('dashboard', ['params' => $data['package_name'], 'paramsEnd' => 'detail-package']) }}"
                            class="inline-block bg-green-500 hover:bg-green-600 text-white text-sm font-semibold py-1.5 px-4 rounded-md shadow-sm transition">
                            Edit
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
