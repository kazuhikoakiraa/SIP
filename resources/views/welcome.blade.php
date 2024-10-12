<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INVENTARIS MESIN | PT. SUMBER INDAHPERKASA</title>

    <!-- Link Favicon -->
    <link rel="icon" href="../assets/img/logo-landing.png" type="image/png">

    <!-- Style and Scripts -->
    @include('assets.style')
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-cover bg-center bg-no-repeat" style="background-image: url('/assets/img/landing.png'); height: 100vh;">
    <!-- Content Body -->
    <div class="flex flex-col items-center h-full space-y-8">
        <div class="flex flex-col items-center mt-20 md:mt-36 md:items-center md:space-x-10 lg:space-x-10 lg:mt-48">
            <img src="../assets/img/logo-landing.png" alt="Logo Sinarmas" class="rounded-lg mt-7 w-16 h-16 lg:mt-0 sm:w-24 sm:h-24 md:w-32 md:h-32 lg:w-40 lg:h-40">
            <h1 class="text-2xl font-bold mt-4 sm:text-3xl md:text-5xl lg:text-6xl" style="font-family:'Poppins'; color: #000000;">
                PT. SUMBER INDAHPERKASA
            </h1>
            <h1 class="text-2xl font-bold mt-4 sm:text-3xl md:text-5xl lg:text-6xl" style="font-family:'Poppins'; color: #000000;">
                DEPT. ENGINEERING
            </h1>
        </div>
        <div class="flex space-x-4 sm:space-x-16 md:space-x-32">
            <div class="inline-flex px-10 py-4 mt-64 md:py-6 md:mt-40 lg:mt-40 lg:py-9 text-black text-sm font-medium rounded-lg items-center bg-[#7EA7D8] hover:bg-white transition-colors duration-300">
                <button onclick="window.location.href='{{ route('user-location.index') }}'" class="inline-flex font-extrabold space-x-2 sm:space-x-4 md:space-x-6 lg:space-x-6">
                    <span>USER</span>
                    <i data-feather="arrow-right-circle"></i>
                </button>
            </div>
            <div class="inline-flex px-10 py-4 mt-64 md:py-6 md:mt-40 lg:mt-40 lg:py-9 text-black text-sm font-medium rounded-lg items-center bg-[#7EA7D8] hover:bg-white transition-colors duration-300">
                <button onclick="window.location.href='{{ route('login') }}'" class="inline-flex font-extrabold space-x-2 sm:space-x-4 md:space-x-6 lg:space-x-6">
                    <span>ADMIN</span>
                    <i data-feather="arrow-right-circle"></i>
                </button>
            </div>
        </div>
    </div>

    @include('assets.js')
</body>

</html>
