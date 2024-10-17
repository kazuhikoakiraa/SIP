<!-- Hamburger Button -->
<button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-[#FFC857] focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400">
    <i data-feather="menu" class="w-6 h-6"></i>
</button>

<!-- Sidebar -->
<aside id="logo-sidebar" class="fixed top-0 left-0 z-50 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto" style="background-color: #3B4A6B;">
        <a class="flex items-center mb-4">
            <span class="self-center text-lg font-bold text-white">EQUIPMENT INVENTORY
            <hr class="bg-white">
            </span>
        </a>

        <!-- Profile Section with More Professional Styling -->
        <div class="flex items-center p-4 mb-3 rounded-lg shadow-lg bg-gradient-to-r from-[#FFC857] to-[#FFD369]">
            <div class="relative">
                <img class="w-16 h-16 rounded-full border-4 border-white shadow-lg" src="{{ Auth::user()->img ? asset('assets/img/' . Auth::user()->img) : asset('assets/default-profile.png') }}" alt="Profile Picture">
                <!-- Optional Status Circle -->
                <span class="absolute bottom-0 right-0 w-4 h-4 bg-green-500 border-2 border-white rounded-full"></span>
            </div>
            <div class="ml-4 text-white">
                <p class="text-md font-medium text-black">{{ Auth::user()->name }}</p>
                <p class="text-sm font-light text-black">{{ Auth::user()->jabatan }}</p>
            </div>
        </div>

        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{route('dashboard.index')}}" class="flex items-center p-2 rounded-lg {{ request()->is('dashboard*') ? 'bg-[#FFC857] text-black border-l-4 border-white' : 'text-white' }} hover:bg-[#FFC857] hover:text-black group transition-colors duration-300" style="font-family: 'Poppins';">
                    <i data-feather="clipboard"></i>
                    <span class="ms-3">DASHBOARD</span>
                </a>
            </li>
            <li>
                <a href="{{route('location.index')}}" class="flex items-center p-2 rounded-lg {{ request()->is('location*') ? 'bg-[#FFC857] text-black border-l-4 border-white' : 'text-white' }} hover:bg-[#FFC857] hover:text-black group transition-colors duration-300" style="font-family: 'Poppins';">
                    <i data-feather="map-pin"></i>
                    <span class="ms-3">LOCATION</span>
                </a>
            </li>
            <li>
                <button type="button" class="flex items-center p-2 w-full rounded-lg {{ request()->is('motor*') || request()->is('pump*') || request()->is('gear*') ? 'bg-[#FFC857] text-black border-l-4 border-white' : 'text-white' }} hover:bg-[#FFC857] hover:text-black group transition-colors duration-300" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <i data-feather="tool"></i>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap" style="font-family: 'Poppins';">EQUIPMENT</span>
                    <i data-feather="chevron-down"></i>
                </button>
                <ul id="dropdown-example" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{route('motor.index')}}" class="flex items-center p-2 rounded-lg {{ request()->is('motor*') ? 'bg-[#FFC857] text-black border-l-4 border-white' : 'text-white' }} hover:bg-[#FFC857] hover:text-black group transition-colors duration-300 ml-10" style="font-family: 'Poppins';">MOTOR</a>
                    </li>
                    <li>
                        <a href="{{route('pump.index')}}" class="flex items-center p-2 rounded-lg {{ request()->is('pump*') ? 'bg-[#FFC857] text-black border-l-4 border-white' : 'text-white' }} hover:bg-[#FFC857] hover:text-black group transition-colors duration-300 ml-10" style="font-family: 'Poppins';">PUMP</a>
                    </li>
                    <li>
                        <a href="{{route('gear.index')}}" class="flex items-center p-2 rounded-lg {{ request()->is('gear*') ? 'bg-[#FFC857] text-black border-l-4 border-white' : 'text-white' }} hover:bg-[#FFC857] hover:text-black group transition-colors duration-300 ml-10" style="font-family: 'Poppins';">GEAR-BOX</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{route('profile.index')}}" class="flex items-center p-2 rounded-lg {{ request()->is('profile*') ? 'bg-[#FFC857] text-black border-l-4 border-white' : 'text-white' }} hover:bg-[#FFC857] hover:text-black group transition-colors duration-300" style="font-family: 'Poppins';">
                    <i data-feather="user"></i>
                    <span class="ms-3">PROFILE</span>
                </a>
            </li>
            <br><hr class="bg-white"><br>
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="flex items-center p-2 text-white rounded-lg hover:bg-[#FFC857] group transition-colors duration-300" style="font-family: 'Poppins';">
                    <i data-feather="log-out"></i>
                    <span class="ms-3">LOG-OUT</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</aside>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const hamburgerBtn = document.querySelector('[data-drawer-toggle="logo-sidebar"]');
    const sidebar = document.getElementById('logo-sidebar');
    const dropdownToggle = document.querySelector('[data-collapse-toggle="dropdown-example"]');
    const dropdown = document.getElementById('dropdown-example');

    hamburgerBtn.addEventListener('click', function() {
        sidebar.classList.toggle('-translate-x-full');
    });

    dropdownToggle.addEventListener('click', function() {
        dropdown.classList.toggle('hidden');
    });

    feather.replace(); // Initialize feather icons on page load
});
</script>

<style>
/* Sidebar transition */
#logo-sidebar {
    transition: transform 0.3s ease-in-out;
    z-index: 50;
    width: 16rem;
    background-color: #3B4A6B;
}

/* Show sidebar when visible */
.translate-x-0 {
    transform: translateX(0);
}

/* Sidebar hidden on small screens (default state) */
.-translate-x-full {
    transform: translateX(-100%);
}

/* Show sidebar for large screens (desktop) */
@media (min-width: 640px) {
    #logo-sidebar {
        transform: translateX(0); /* Sidebar is always visible on larger screens */
    }
}

/* Smooth transition for dropdown */
ul#dropdown-example {
    transition: all 0.3s ease-in-out;
    transform-origin: top;
}

/* Hidden state for dropdown */
.hidden {
    display: none;
}

/* Styling for profile section */
.flex.items-center.p-4.mb-3 {
    border-radius: 12px;
    background: linear-gradient(90deg, rgba(255,200,87,1) 0%, rgba(255,211,105,1) 100%);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Profile Picture Styling */
img.rounded-full {
    border-radius: 50%;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    border: 3px solid white;
}

/* Optional: Status indicator */
span.absolute.w-4.h-4.bg-green-500 {
    border-radius: 50%;
    border: 2px solid white;
}

/* Adjust the text for name and position */
.text-md.font-medium {
    font-family: 'Poppins', sans-serif;
    font-size: 1rem;
}

.text-sm.font-light {
    font-family: 'Poppins', sans-serif;
    font-size: 0.875rem;
}

.text-base.duration-75 {
    transition: all 0.75s ease-in-out;
}

/* Active and Hover State */
.flex.items-center.p-2:hover {
    background-color: #FFC857;
    color: black;
}

.flex.items-center.p-2.bg-[#FFC857] {
    color: black;
    border-left-width: 4px;
    border-left-color: white;
}
</style>
