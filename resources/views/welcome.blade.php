<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @vite('resources/css/app.css')
    <title>INVENTARIS MESIN | PT. SUMBER INDAHPERKASA</title>
</head>
<body class="bg-cover bg-center bg-no-repeat" style="background-image: url('/assets/img/landing.png'); height: 100vh;">
    <div class="flex flex-col items-center h-full space-y-8">
        <div class="flex flex-col items-center mt-20 md:mt-36 md:items-center md:space-x-10 lg:space-x-10 lg:mt-48">
            <img src="../assets/img/logo-landing.png" alt="Logo Sinarmas" class="rounded-lg mt-7 w-16 h-16 lg:mt-0 sm:w-24 sm:h-24 md:w-32 md:h-32 lg:w-40 lg:h-40">
            <h1 class="text-2xl font-bold mt-4 sm:text-3xl md:text-5xl lg:text-6xl " style="font-family:'Poppins'; color: #000000;">
                PT. SUMBER INDAHPERKASA
            </h1>
        </div>
        <div class="flex space-x-4 sm:space-x-16 md:space-x-32">
            <div class="inline-flex px-10 py-4 mt-64 md:py-6 md:mt-40 lg:mt-40 lg:py-9 text-black text-sm font-medium rounded-lg items-center" style="background-color:#7EA7D8">
                <button onclick="" class="inline-flex font-extrabold space-x-2"> 
                    <span>USER</span> 
                    <i data-feather="arrow-right-circle"></i>
                </button>
            </div>
            <div class="inline-flex px-10 py-4 mt-64 md:py-6 md:mt-40 lg:mt-40 lg:py-9 text-black text-sm font-medium rounded-lg items-center" style="background-color: #ffffff;">
                <button onclick="" class="inline-flex font-extrabold space-x-5">
                    <span>ADMIN</span>
                    <i data-feather="arrow-right-circle"></i>
                </button>
            </div>
        </div>
    </div>
<script> feather.replace(); </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
