<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Link Favicon -->
     <link rel="icon" href="../assets/img/logo-landing.png" type="image/png">
    @include('assets.style')
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>DASHBOARD | PT. SUMBER INDAHPERKASA</title>
</head>
<body style="background-color: #F9FAFB; color: #2C3E50; font-family: 'Poppins', sans-serif;">
    @include('layout.side')
    <div class="p-4 sm:ml-64">
        <nav class="navbar navbar-light bg-white rounded-lg shadow-md p-4 mb-6 flex justify-between items-center">
            <a class="navbar-brand font-bold text-black text-3xl" style="font-family: 'Poppins';" href="#">
                DASHBOARD
            </a>
            <div class="flex items-center">
                <img src="../assets/img/logo-landing.png" alt="Company Logo" class="h-10 w-10 mr-3">
                <a href="#" class="font-bold text-black text-lg">PT. SUMBER INDAHPERKASA</a>
            </div>
        </nav>

        <div class="mt-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                @foreach ($locations as $location)
                    <div class="flex flex-col items-center justify-center p-6 rounded-xl shadow-md transform transition duration-300 hover:scale-105 hover:shadow-lg"
                         style="background: {{ $location['gradient'] }};">
                        <p class="text-2xl text-black font-bold mb-2">{{ $location['name'] }}</p>
                        <hr class="w-10/12 border-2 border-black mb-3">
                        <p class="text-6xl font-extrabold text-black">{{ $location['equipment_count'] }}</p>
                        <p class="text-lg text-black mt-2">Equipment</p>
                    </div>
                @endforeach
            </div>
        </div>

    @include('assets.js')
</body>
</html>
