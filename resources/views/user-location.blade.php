<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('assets.style')
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>USER LOCATION | PT. SUMBER INDAHPERKASA</title>
</head>

<body>
    @include('layout.user-nav')

    <div class="p-4">
        <h1 class="font-bold text-3xl p-3">LOCATION</h1>
        <!-- Search Bar -->
        <div class="flex justify-center items-center mb-4 -ml-3">
            <div class="relative w-80">
                <form action="{{ route('user-location.index') }}" method="GET">
                    <input type="text" name="search" value="{{ $search ?? '' }}" class="pl-10 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg w-full bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i data-feather="search"></i>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Search Bar -->

         <!-- Page Length and Button Add Item -->
         <div class="flex justify-center md:-mb-3">
            <div class="flex items-center space-x-3 md:justify-between md:space-x-40 lg:space-x-96">
                <label class="flex items-center space-x-1.5 mb-4 -ml-7 md:mb-0">
                    <span>Show</span>
                    <form action="{{route('user-location.index')}}" method="GET">
                        <select name="pageLength" onchange="this.form.submit()" class="w-16 form-control input-sm border border-gray-300 rounded-lg py-1 px-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="10" {{ $pageLength == 10 ? 'selected' : '' }}>10</option>
                            <option value="25" {{ $pageLength == 25 ? 'selected' : '' }}>25</option>
                            <option value="50" {{ $pageLength == 50 ? 'selected' : '' }}>50</option>
                            <option value="100" {{ $pageLength == 100 ? 'selected' : '' }}>100</option>
                        </select>
                    </form>
                    <span>entries</span>
                </label>
             </div>
        </div>
        <!-- End Page Length and Button Add Item -->

        <div class="relative overflow-x-auto sm:rounded-lg">    
        <!-- Table -->
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mx-auto lg:w-2/3">
                <thead class="text-sm text-black uppercase bg-white border-1 border-black">
                    <tr>
                        <th scope="col" class="px-6 py-3 border-1 border-black whitespace-nowrap">
                            <div class="flex items-center">
                                LOCATION NAME
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 border-1 border-black whitespace-nowrap">
                            <div class="flex items-center">
                                ID LOCATION
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($locations as $item)
                    <tr class="bg-white border-1 border-black">
                        <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                            {{ $item->name }}
                        </td>
                        <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                            {{ $item->tag }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- End Table -->
        </div>
    </div>

       <!-- Pagination -->
       <div class="flex justify-center mt-4">
        {{ $locations->appends(['search' => $search, 'pageLength' => $pageLength])->links('vendor.pagination.tailwind') }}
    </div>

    <!-- End Pagination -->

    @include('assets.js')

</body>

</html>
