<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('assets.style')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Login | PT. SUMBER INDAHPERKASA</title>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <!-- Komponen Utama -->
    <div class="layout flex items-center justify-center w-full max-w-4xl px-10 py-8 border-2 border-gray-300 bg-white rounded-md shadow-lg">
        <!-- Panel Kiri -->
        <div class="hidden lg:flex lg:w-1/2 items-center justify-center rounded-md">
            <img class="rounded-md" src="{{ asset('assets/img/login-image.png') }}" alt="equipment">
        </div>
        <!-- Panel Kanan -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-6">
            <div class="max-w-md w-full rounded-md">
                <h1 class="text-3xl font-semibold mb-6 text-black text-center">Sign In</h1>
                @if($errors->any())
                    <div class="bg-red-500 text-white p-3 rounded-md mb-4">
                        {{ $errors->first() }}
                    </div>
                @endif
                @if(session('success'))
                    <div class="bg-green-500 text-white p-3 rounded-md mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('login') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                        <input type="text" id="username" name="username" class="mt-1 p-2 w-full border rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300" value="{{ old('username') }}">
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="password" name="password" class="mt-1 p-2 w-full border rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                    </div>
                    <div>
                        <button type="submit" class="w-full bg-black text-white p-2 rounded-md hover:bg-gray-800 focus:outline-none focus:bg-black focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-colors duration-300">Sign In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('assets.js')
</body>
</html>
