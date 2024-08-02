<button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400">
   <i data-feather="menu" class="w-6 h-6"></i>
</button>

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
   <div class="h-full px-3 py-4 overflow-y-auto" style="background-color: #51739B;">
      <a class="flex items-center mb-5">
         <span class="self-center text-lg font-bold text-black">EQUIPMENT INVENTORY
         <hr class="bg-black">
         </span>

      </a>

      <ul class="space-y-2 font-medium">
         <li>
            <a href="#" class="flex items-center p-2 text-black rounded-lg font-bold hover:bg-gray-100 group" style="font-family: 'Poppins';">
               <i data-feather="clipboard"></i>
               <span class="ms-3">DASHBOARD</span>
            </a>
         </li>
         <li>
            <a href="{{route('location.index')}}" class="flex items-center p-2 text-black rounded-lg font-bold hover:bg-gray-100 group" style="font-family: 'Poppins';">
               <i data-feather="map-pin"></i>
               <span class="ms-3 ">LOCATION</span>
            </a>
         </li>
         <li>
            <button type="button" class="flex items-center p-2 text-base duration-75 text-black rounded-lg font-bold hover:bg-gray-100 dark:hover:bg-white-700 group" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                  <i data-feather="tool"></i>
                  <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap" style="font-family: 'Poppins';">EQUIPMENT</span>
                  <i data-feather="chevron-down"></i>
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                  </svg>
            </button>
            <ul id="dropdown-example" class="hidden py-2 space-y-2">
                  <li>
                     <a href="{{route('motor.index')}}" class="flex items-center p-2 text-base duration-75 text-black rounded-lg font-bold hover:bg-gray-100 group ml-10" style="font-family: 'Poppins';">MOTOR</a>
                  </li>
                  <li>
                     <a href="{{route('pump.index')}}" class="flex items-center p-2 text-base duration-75 text-black rounded-lg font-bold hover:bg-gray-100 group ml-10" style="font-family: 'Poppins';">PUMP</a>
                  </li>
                  <li>
                     <a href="{{route('gear.index')}}" class="flex items-center p-2 text-base duration-75 text-black rounded-lg font-bold hover:bg-gray-100 group ml-10" style="font-family: 'Poppins';">GEAR-BOX</a>
                  </li>
            </ul>
         </li>
         <li>
            <a href="{{route('profile.index')}}" class="flex items-center p-2 text-black rounded-lg font-bold hover:bg-gray-100 dark:hover:bg-white-700 group" style="font-family: 'Poppins';">
               <i data-feather="user"></i>
               <span class="ms-3">PROFILE</span>
            </a>
         </li>
         <br><br><hr class="bg-black"><br><br>
         <li>
            <a href="#" class="flex items-center p-2 text-black rounded-lg font-bold hover:bg-gray-100" style="font-family: 'Poppins';">
               <i data-feather="log-out"></i>
               <span class="ms-3">LOG-OUT</span>
            </a>
         </li>
      </ul>
   </div>
</aside>
</div>
