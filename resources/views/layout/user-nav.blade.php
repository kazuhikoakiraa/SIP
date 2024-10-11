<!-- component -->
<!-- This is an example component -->

<nav class="border-gray-200" style="background-color: #51739B;">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-3">
        <a href="{{'/'}}" class=" inline-flex items-center space-x-3">
            <img src="../assets/img/logo-landing.png" class="h-10">
            <span class="self-center text-lg font-semibold whitespace-nowrap">PT SUMBER INDAHPERKASA</span>
        </a>
        <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center w-7 h-7 justify-center text-sm text-black-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-dropdown" aria-expanded="false">
            <i class="w-6 h-6" data-feather="menu"></i>
        </button>
        <!-- navigasi kanan -->
        <div class="hidden w-full md:block md:w-auto items-center" id="navbar-dropdown">
            <ul class="flex-col md:flex-row flex md:space-x-8 md:mt-0 md:text-lg md:font-medium">
                <li class="flex justify-center">
                <a href="{{route('user-location.index')}}" class="font-medium text-black block pl-3 pr-4 py-2 md:p-0 rounded focus:outline-none" aria-current="page">LOCATION</a>
                </li>
                <li class="flex justify-center">
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="text-black pl-3 pr-4 py-2 font-medium flex justify-center items-center w-full">EQUIPMENT <i class="w-4 h-4 ml-1" data-feather="chevron-down"></i> </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar" class="hidden text-base bg-blue-200 z-10 list-none rounded shadow-md w-44" >
                        <ul class="py-1" aria-labelledby="dropdownLargeButton">
                        <li>
                            <a href="{{route('user-motor.index')}}" class="text-md text-black block px-4 py-2">MOTOR</a>
                        </li>
                        <li>
                            <a href="{{route('user-pump.index')}}" class="text-md text-black block px-4 py-2">PUMP</a>
                        </li>
                        <li>
                            <a href="{{route('user-gear.index')}}" class="text-md text-black block px-4 py-2">GEAR-BOX</a>
                        </li>
                        </ul>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</nav>



<script src="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/flowbite.bundle.js"></script>
