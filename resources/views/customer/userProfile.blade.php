<x-layout.layout>
    <div class="min-h-screen bg-green-50 text-green-900 flex justify-center items-start py-10 px-6">
        <div class="w-full max-w-6xl grid grid-cols-1 md:grid-cols-4 gap-6">
            <!-- Sidebar -->
            <div
                class="md:col-span-1 h-full md:h-[calc(100vh-5rem)] sticky top-20 bg-white p-6 rounded-2xl flex flex-col items-center shadow-lg border border-green-200">
                <!-- Foto Profil -->
                <div
                    class="w-32 h-32 rounded-full border-4 border-green-500 flex items-center justify-center text-center mb-6 text-green-700 font-bold">
                    <span>user profile</span>
                </div>

                <!-- Info User -->
                <div class="text-center space-y-1">
                    <p class="text-lg font-semibold text-green-800">Username</p>
                    <p class="text-sm text-green-600">Email</p>
                </div>
            </div>

            <!-- Konten Utama -->
            <div class="md:col-span-3 bg-white p-6 rounded-2xl shadow-lg border border-green-200">
                <h2 class="text-2xl font-semibold text-green-800 mb-6">Order History</h2>

                <!-- Kartu Order -->
                <div class="border border-green-300 p-4 space-y-3 rounded-lg bg-green-50 my-5">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                        <div class="flex flex-wrap gap-4">
                            <button
                                class="bg-green-200 border border-green-600 text-green-900 px-3 py-1 text-sm rounded">Paket</button>
                            <span class="text-sm text-green-700 mt-1">17 - 04 - 2007</span>
                        </div>
                        <button
                            class="bg-green-300 border border-green-700 text-green-900 px-4 py-1 text-sm rounded">status
                            order</button>
                    </div>
                    <div>
                        <button
                            class="bg-green-200 border border-green-600 text-green-900 px-3 py-1 text-sm rounded">Harga</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout.layout>
