<!-- component -->
<!-- This is an example component -->
<div class="w-full px-1" style="background-color: #51739B;">
    <nav class="border-gray-200">
    <div class="container flex flex-wrap items-center justify-between">
        <a href="#" class="flex">
            <img src="../assets/img/logo-landing.png" class="h-10 mr-3 p-1" width="40" height="40">
            <span class="self-center text-lg font-semibold whitespace-nowrap">PT SUMBER INDAHPERKASA</span>
        </a>
        <button data-collapse-toggle="mobile-menu" type="button" class="md:hidden ml-3 text-black rounded-lg inline-flex items-center justify-center" >
        <i class="w-6 h-6" data-feather="menu"></i>
        </button>
        <!-- navigasi kanan -->
        <div class="md:block w-full md:w-auto" id="mobile-menu">
        <ul class="flex-col md:flex-row flex md:space-x-8 mt-4 md:mt-0 md:text-sm md:font-medium">
            <li class="flex justify-center">
            <a href="#" class="font-medium text-black block pl-3 pr-4 py-2 md:p-0 rounded focus:outline-none" aria-current="page">Location</a>
            </li>
            <li class="flex justify-center">
                <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="text-black pl-3 pr-4 py-2 font-medium flex justify-center items-center w-full">Equipment <i class="w-4 h-4 ml-1" data-feather="chevron-down"></i> </button>
                <!-- Dropdown menu -->
                <div id="dropdownNavbar" class="hidden text-base bg-blue-200 z-10 list-none rounded shadow-md w-44" >
                    <ul class="py-1" aria-labelledby="dropdownLargeButton">
                    <li>
                        <a href="#" class="text-md text-black block px-4 py-2">Motor</a>
                    </li>
                    <li>
                        <a href="#" class="text-md text-black block px-4 py-2">Pump</a>
                    </li>
                    <li>
                        <a href="#" class="text-md text-black block px-4 py-2">Gear-Box</a>
                    </li>
                    </ul>
                </div>
            </li>
            
        </ul>
        </div>
    </div>
    </nav>
</div>

<script src="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/flowbite.bundle.js"></script>