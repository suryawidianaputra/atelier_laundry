<x-layout.layout :title="'login'">
    <div class="flex w-full min-h-screen justify-center items-center bg-gray-100 p-7">
        <div class="sm:flex-row flex flex-col w-full max-w-4xl bg-white rounded-lg shadow-lg overflow-hidden">
            <!-- Left Side -->
            <div
                class="sm:w-1/2 w-full bg-cover bg-center bg-[url('{{ asset('assets/images/laundrybg.jpg') }}')] flex flex-col items-center justify-center p-10 bg-center">
                <h2 class="text-white font-bold text-[25px]">New User !</h2>
            </div>

            <!-- Right Side -->
            <div class="sm:w-1/2 w-full p-10">
                <h2 class="text-2xl font-semibold text-gray-700 text-center">Hi New User !</h2>
                <p class="text-gray-500 text-center mb-6">Create New Account </p>
                @if (session('error'))
                    <p class="p-0 m-0"><span class="text-red-500">*</span> {{ session('error') }}</p>
                @endif
                <form action="" method="POST">
                    @csrf
                    {{-- username --}}
                    <div class="mt-5">
                        <label class="block text-gray-600" for="username">Username</label>
                        <input required type="text" id="username" name="username" placeholder="citlali123"
                            class="mt-1 w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    </div>
                    {{-- email --}}
                    <div class="mb-4">
                        <label class="block text-gray-600" for="email">Email</label>
                        <input required type="email" id="email" name="email" placeholder="example@gmail.com"
                            class="mt-1 w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    </div>
                    {{-- password --}}
                    <div class="mb-4">
                        <label class="block text-gray-600" for="password">Password</label>
                        <input required type="password" id="password" name="password" placeholder="••••••••"
                            class="mt-1 w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    </div>
                    {{-- address --}}
                    <div class="mb-4">
                        <label class="block text-gray-600" for="addres">Address</label>
                        <input required type="text" id="addres" name="address" placeholder="Your Addres...."
                            class="mt-1 w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    </div>
                    {{-- phone number --}}
                    <div class="mb-4">
                        <label class="block text-gray-600" for="number">Phone Number</label>
                        <input required type="tel" id="number" name="phone_number"
                            placeholder="Your phone number...."
                            class="mt-1 w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    </div>
                    <p class="mt-4 mb-3 text-gray-600">Already have an account? <a href=""
                            class="text-blue-500">Login</a>
                    </p>
                    {{-- button --}}
                    <button type="submit"
                        class="w-full bg-blue-400 hover:bg-blue-600 text-white py-2 rounded-lg transition">Register</button>
                </form>
            </div>
        </div>
    </div>
</x-layout.layout>
