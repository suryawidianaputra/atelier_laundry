<x-layout :title="'login'">
    <div class="flex w-full h-screen justify-center items-center bg-gray-100 p-7">
        <div class="flex flex-col sm:flex-row w-full max-w-4xl bg-white rounded-lg shadow-lg overflow-hidden">
            <!-- Left Side -->
            <div
                class="sm:w-1/2 w-full bg-cover bg-center bg-[url('{{ asset('assets/images/laundry.jpg') }}')] flex flex-col items-center justify-center p-10">
                <h2 class="text-white font-bold text-[25px]">Welcome Back!</h2>
            </div>

            <!-- Right Side -->
            <div class="sm:w-1/2 w-full p-10">
                <h2 class="text-2xl font-semibold text-gray-700 text-center">Login</h2>
                <p class="text-gray-500 text-center mb-6">Welcome back! Please login to your account.</p>

                <form action="" method="POST">
                    @csrf
                    @if (session('error'))
                        <p class="p-0 m-0"><span class="text-red-500">*</span> {{ session('error') }}</p>
                    @endif
                    <div class="mb-4">
                        <label class="block text-gray-600" for="email">Email</label>
                        <input type="text" id="email" name="email" placeholder="example@gmail.com"
                            class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-600" for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="••••••••"
                            class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div class="flex justify-between items-center mb-4">
                        <a href="" class="text-blue-500 text-sm">Forgot Password?</a>
                    </div>
                    <button type="submit"
                        class="w-full bg-blue-400 hover:bg-blue-600 text-white py-2 rounded-lg transition">Login</button>
                </form>
                <p class="mt-4 text-center text-gray-600">New User? <a href="" class="text-blue-500">Signup</a>
                </p>
            </div>

        </div>
    </div>
</x-layout>
