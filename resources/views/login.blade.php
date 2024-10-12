<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('assets.style')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Login | PT. SUMBER INDAHPERKASA</title>
    <style>
        body {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            font-family: 'Poppins'
        }
        .layout {
            transition: transform 0.5s, box-shadow 0.5s;
            background: linear-gradient(to bottom right, #ffffff, #f9fafb);
        }
        .layout:hover {
            transform: scale(1.05);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }
        .button-wow {
            background: linear-gradient(to right, #ff7e5f, #feb47b);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: background 0.3s, box-shadow 0.3s;
        }
        .button-wow:hover {
            background: linear-gradient(to right, #ff6a5f, #fe8a7b);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen">
    <!-- Komponen Utama -->
    <div class="layout flex items-center justify-center w-full max-w-4xl px-10 py-8 bg-white rounded-md shadow-2xl">
        <!-- Panel Kiri -->
        <div class="hidden lg:flex lg:w-1/2 items-center justify-center rounded-md">
            <img class="rounded-md shadow-lg" src="{{ asset('assets/img/login-image.png') }}" alt="equipment">
        </div>
        <!-- Panel Kanan -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-6">
            <div class="max-w-md w-full">
                <h1 class="text-4xl font-bold mb-6 text-gray-800 text-center">Sign In</h1>
                @if($errors->any())
                    <div class="bg-red-100 text-red-700 p-3 rounded-md mb-4">
                        {{ $errors->first() }}
                    </div>
                @endif
                @if(session('success'))
                    <div class="bg-green-100 text-green-700 p-3 rounded-md mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('login') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="username" class="block text-lg font-medium text-gray-700">Username</label>
                        <input type="text" id="username" name="username" class="mt-2 p-4 w-full border border-gray-300 rounded-lg focus:border-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-400 transition-colors duration-300" value="{{ old('username') }}">
                    </div>
                    <div>
                        <label for="password" class="block text-lg font-medium text-gray-700">Password</label>
                        <input type="password" id="password" name="password" class="mt-2 p-4 w-full border border-gray-300 rounded-lg focus:border-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-400 transition-colors duration-300">
                    </div>
                    <div>
                        <button type="submit" class="button-wow w-full text-white p-4 rounded-lg focus:outline-none focus:ring-4 focus:ring-gray-400 transition-all duration-300">Sign In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('assets.js')
</body>
</html>
