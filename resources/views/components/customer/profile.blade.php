<div
    class="md:col-span-1 h-full md:h-[calc(100vh-5rem)] sticky top-20 bg-white p-6 rounded-2xl flex flex-col items-center shadow-lg border border-green-200">
    <!-- Foto Profil -->
    <div
        class="w-32 h-32 rounded-full border-4 border-green-500 flex items-center justify-center text-center mb-6 text-green-700 font-bold">
        <span>user profile</span>
    </div>

    <!-- Info User -->
    <div class="text-center space-y-1">
        <p class="text-xl font-semibold text-green-800">{{ $user_data->username }}</p>
        <p class="text-[15px] text-green-600">{{ $user_data->email }}</p>
    </div>
</div>
