<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('assets.style')
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>DASHBOARD | PT. SUMBER INDAHPERKASA</title>
</head>
<body>
    @include('layout.side')
    <div class="p-2 sm:ml-64">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand font-bold" style="font-family: 'Poppins';" href="#">
                    DASHBOARD
                </a>
                <div class="align-text-top inline-flex md:ml-36 lg:ml-36 hidden sm:flex md:flex lg:flex">
                    <img src="../assets/img/logo-landing.png" alt="" class="h-8 w-8 p-1">
                    <a href="" class="font-bold p-1">PT. SUMBER INDAHPERKASA</a>
                </div>
            </div>
        </nav>
    
        <div class="mt-2 ml-2">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
                <div class="flex flex-col items-center justify-center h-auto w-auto rounded-lg bg-red-400">
                    <p class="text-2xl p-2 text-black font-semibold whitespace-nowrap">Location Name</p>
                    <hr class="w-full border-4 border-black">
                    <p class="text-5xl font-bold text-black my-1">50</p>
                    <p class="text-md py-2 text-black">Equipment</p>
                </div>

                <div class="flex flex-col items-center justify-center h-auto w-auto rounded-lg bg-blue-400">
                    <p class="text-2xl p-2 text-black font-semibold whitespace-nowrap">Location Name</p>
                    <hr class="w-full border-4 border-black">
                    <p class="text-5xl font-bold text-black my-1">10</p>
                    <p class="text-md py-2 text-black">Equipment</p>
                </div>

                <div class="flex flex-col items-center justify-center h-auto w-auto rounded-lg bg-yellow-400">
                    <p class="text-2xl p-2 text-black font-semibold whitespace-nowrap">Location Name</p>
                    <hr class="w-full border-4 border-black">
                    <p class="text-5xl font-bold text-black my-1">95</p>
                    <p class="text-md py-2 text-black">Equipment</p>
                </div>
                
                <div class="flex flex-col items-center justify-center h-auto w-auto rounded-lg bg-green-400">
                    <p class="text-2xl p-2 text-black font-semibold whitespace-nowrap">Location Name</p>
                    <hr class="w-full border-4 border-black">
                    <p class="text-5xl font-bold text-black my-1">1006</p>
                    <p class="text-md py-2 text-black">Equipment</p>
                </div>
            </div>
        </div>
    </div>    

    @include('assets.js')
</body>
</html>
