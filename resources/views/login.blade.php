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
            background: #f9fafb;
            font-family: 'Poppins', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }
        .layout {
            transition: box-shadow 0.3s;
            background: #ffffff;
            border-radius: 12px;
            padding: 2.5rem;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 900px;
            display: flex;
            flex-direction: row;
            gap: 2rem;
            background-color: #ffffff;
        }
        .layout:hover {
            box-shadow: 0 20px 35px rgba(0, 0, 0, 0.15);
        }
        .button-wow {
            background: #1e3c72;
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            transition: background 0.3s, box-shadow 0.3s;
            width: 100%;
            padding: 0.75rem;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
        }
        .button-wow:hover {
            background: #163056;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
        }
        .input-field {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            margin-top: 0.5rem;
            margin-bottom: 1rem;
            transition: border 0.3s;
            background: #f1f5f9;
        }
        .input-field:focus {
            border-color: #1e3c72;
            outline: none;
            background: #ffffff;
        }
        .form-label {
            font-weight: 600;
            color: #4a5568;
        }
        .message {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
        }
        .error-message {
            background: #ffe5e5;
            color: #c53030;
        }
        .success-message {
            background: #e6fffa;
            color: #2f855a;
        }
        .image-container {
            display: none;
        }
        .form-container {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
            padding: 2rem;
            border: 1px solid #e2e8f0;
        }
        @media (min-width: 1024px) {
            .image-container {
                display: block;
                width: 50%;
                padding: 1rem;
                background: #ffffff;
                border-radius: 12px;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
            }
            .form-container {
                width: 50%;
                padding: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Komponen Utama -->
    <div class="layout">
        <!-- Panel Kiri -->
        <div class="image-container">
            <img class="rounded-md shadow-lg" src="{{ asset('assets/img/login-image.png') }}" alt="equipment">
        </div>
        <!-- Panel Kanan -->
        <div class="form-container">
            <h1 class="text-3xl font-bold mb-4 text-center text-gray-800">Sign In</h1>
            @if($errors->any())
                <div class="message error-message">
                    {{ $errors->first() }}
                </div>
            @endif
            @if(session('success'))
                <div class="message success-message">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div>
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" class="input-field" value="{{ old('username') }}">
                </div>
                <div>
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="input-field">
                </div>
                <div>
                    <button type="submit" class="button-wow">Sign In</button>
                </div>
            </form>
        </div>
    </div>
    @include('assets.js')
</body>
</html>
