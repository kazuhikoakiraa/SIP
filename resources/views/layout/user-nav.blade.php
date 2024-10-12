<!-- Updated Navbar -->
<nav class="border-gray-200 shadow-lg relative" style="background-color: #3B4A6B; height: 60px; z-index: 50;">
    <div class="flex items-center justify-between p-3">
        <!-- Logo & Title -->
        <a href="{{'/'}}" class="inline-flex items-center space-x-3 hover:opacity-90 transition-opacity duration-300">
            <img src="../assets/img/logo-landing.png" class="h-8">
            <span class="self-center text-lg font-bold whitespace-nowrap text-[#FFC857]">PT SUMBER INDAHPERKASA</span>
        </a>

        <!-- Desktop Menu -->
        <div class="hidden w-full md:flex md:items-center md:w-auto" id="navbar-dropdown">
            <ul class="flex flex-row space-x-6 md:text-lg md:font-medium">
                <li class="flex items-center">
                    <a href="{{route('user-location.index')}}" class="font-medium text-white block px-4 py-2 rounded-lg transition-all duration-300 ease-in-out hover:bg-[#FFC857] hover:text-black {{ request()->is('user-loc*') ? 'bg-[#FFC857] text-black border-l-4 border-white' : '' }}">LOCATION</a>
                </li>
                <li class="flex items-center relative">
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="text-white px-4 py-2 font-medium flex items-center w-full rounded-lg transition-all duration-300 ease-in-out hover:bg-[#FFC857] hover:text-black {{ request()->is('user-motor*') || request()->is('user-pump*') || request()->is('user-gear*') ? 'bg-[#FFC857] text-black border-l-4 border-white' : '' }}">EQUIPMENT <i class="w-4 h-4 ml-1" data-feather="chevron-down"></i></button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar" class="hidden text-base bg-[#4C5B79] z-20 list-none rounded-lg shadow-lg w-44 absolute mt-1 right-0">
                        <ul class="py-1">
                            <li>
                                <a href="{{route('user-motor.index')}}" class="text-md text-white block px-4 py-2 transition-all duration-300 ease-in-out hover:bg-[#FFC857] hover:text-black {{ request()->is('user-motor*') ? 'bg-[#FFC857] text-black border-l-4 border-white' : '' }}">MOTOR</a>
                            </li>
                            <li>
                                <a href="{{route('user-pump.index')}}" class="text-md text-white block px-4 py-2 transition-all duration-300 ease-in-out hover:bg-[#FFC857] hover:text-black {{ request()->is('user-pump*') ? 'bg-[#FFC857] text-black border-l-4 border-white' : '' }}">PUMP</a>
                            </li>
                            <li>
                                <a href="{{route('user-gear.index')}}" class="text-md text-white block px-4 py-2 transition-all duration-300 ease-in-out hover:bg-[#FFC857] hover:text-black {{ request()->is('user-gear*') ? 'bg-[#FFC857] text-black border-l-4 border-white' : '' }}">GEAR-BOX</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>

        <!-- Mobile Menu Icon -->
        <button data-collapse-toggle="navbar-mobile" type="button" class="inline-flex items-center w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden hover:bg-[#FFC857] focus:outline-none focus:ring-2 focus:ring-[#FFC857] transition-all duration-300" aria-controls="navbar-mobile" aria-expanded="false">
            <i class="w-6 h-6" data-feather="menu"></i>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div class="hidden md:hidden" id="navbar-mobile">
        <ul class="flex flex-col p-4 space-y-3 bg-[#4C5B79] rounded-lg relative z-20">
            <li>
                <a href="{{route('user-location.index')}}" class="font-medium text-white block px-4 py-2 rounded-lg transition-all duration-300 ease-in-out hover:bg-[#FFC857] hover:text-black {{ request()->is('location*') ? 'bg-[#FFC857] text-black border-l-4 border-white' : '' }}">LOCATION</a>
            </li>
            <li class="relative">
                <button id="mobileDropdownNavbarLink" data-dropdown-toggle="mobileDropdownNavbar" class="text-white px-4 py-2 font-medium flex items-center w-full rounded-lg transition-all duration-300 ease-in-out hover:bg-[#FFC857] hover:text-black {{ request()->is('motor*') || request()->is('pump*') || request()->is('gear*') ? 'bg-[#FFC857] text-black border-l-4 border-white' : '' }}">EQUIPMENT <i class="w-4 h-4 ml-1" data-feather="chevron-down"></i></button>
                <!-- Mobile Dropdown menu -->
                <div id="mobileDropdownNavbar" class="hidden text-base bg-[#4C5B79] z-30 list-none rounded-lg shadow-lg w-full mt-1">
                    <ul class="py-1">
                        <li>
                            <a href="{{route('user-motor.index')}}" class="text-md text-white block px-4 py-2 transition-all duration-300 ease-in-out hover:bg-[#FFC857] hover:text-black {{ request()->is('motor*') ? 'bg-[#FFC857] text-black border-l-4 border-white' : '' }}">MOTOR</a>
                        </li>
                        <li>
                            <a href="{{route('user-pump.index')}}" class="text-md text-white block px-4 py-2 transition-all duration-300 ease-in-out hover:bg-[#FFC857] hover:text-black {{ request()->is('pump*') ? 'bg-[#FFC857] text-black border-l-4 border-white' : '' }}">PUMP</a>
                        </li>
                        <li>
                            <a href="{{route('user-gear.index')}}" class="text-md text-white block px-4 py-2 transition-all duration-300 ease-in-out hover:bg-[#FFC857] hover:text-black {{ request()->is('gear*') ? 'bg-[#FFC857] text-black border-l-4 border-white' : '' }}">GEAR-BOX</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        feather.replace(); // Replace feather icons

        // Toggle dropdown menus
        const dropdownToggles = document.querySelectorAll('[data-dropdown-toggle]');
        dropdownToggles.forEach(toggle => {
            toggle.addEventListener('click', function() {
                const dropdownMenu = document.getElementById(toggle.getAttribute('data-dropdown-toggle'));
                dropdownMenu.classList.toggle('hidden');
            });
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            dropdownToggles.forEach(toggle => {
                const dropdownMenu = document.getElementById(toggle.getAttribute('data-dropdown-toggle'));
                if (!toggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.add('hidden');
                }
            });
        });
    });
</script>
