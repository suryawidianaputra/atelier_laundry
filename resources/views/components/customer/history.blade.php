<div class="md:col-span-3 bg-white p-6 rounded-2xl shadow-lg border border-green-200 overflow-y-scroll">
    <h2 class="text-2xl font-semibold text-green-800 mb-6">Reservasi History</h2>

    <!-- Kartu Order -->
    @if (!$order_data)
        <div class="h-[30px]">
            <h1 class="text-center">Tidak ada reservasi</h1>
        </div>
    @else
        @foreach ($order_data as $data)
            <div class="border border-green-300 p-4 space-y-3 rounded-lg bg-green-50 my-5">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div class="flex flex-wrap gap-4">
                        <button
                            class="bg-green-200 border border-green-600 text-green-900 px-3 py-1 text-sm rounded">Paket</button>
                        <span class="text-sm text-green-700 mt-1">{{ $data['created_at']->diffForHumans() }}</span>
                    </div>
                    <button
                        class="bg-green-300 border border-green-700 text-green-900 px-4 py-1 text-sm rounded">{{ Str::ucfirst($data['order_status']) }}</button>
                </div>
                <div>
                    <button
                        class="bg-green-200 border border-green-600 text-green-900 px-3 py-1 text-sm rounded">Rp{{ number_format($data['total_amount']) }}</button>
                </div>
            </div>
        @endforeach
    @endif
</div>
