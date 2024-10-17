<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Link Favicon -->
     <link rel="icon" href="../assets/img/logo-landing.png" type="image/png">
    @include('assets.style')
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>USER LOCATION | PT. SUMBER INDAHPERKASA</title>
</head>

<body style="background-color: #F9FAFB; color: #2C3E50; font-family: 'Poppins', sans-serif;">
    @include('layout.user-nav')

    <div class="p-4">
        <nav class="navbar navbar-light bg-white rounded-lg shadow-md p-4 mb-6 flex justify-start items-center w-full mx-auto">
            <h1 class="font-bold text-black text-3xl" style="font-family: 'Poppins'; text-align: center;">LOCATION</h1>
        </nav>

        <div class="mt-6 md:flex md:items-center md:justify-between w-full mx-auto">
            <!-- Page Length and Button Add Item -->
            <div class="flex justify-center md:-mb-3">
                <div class="flex items-center space-x-3 md:justify-between md:space-x-40 lg:space-x-96">
                    <label class="flex items-center space-x-1.5 mb-4 md:mb-0">
                        <span class="text-gray-600 font-medium">Show</span>
                        <form action="{{route('user-location.index')}}" method="GET">
                            <select name="pageLength" onchange="this.form.submit()" class="w-16 form-control input-sm border border-gray-300 rounded-full py-2 px-3 focus:ring-blue-500 focus:border-blue-500 bg-white shadow-md">
                                <option value="10" {{ $pageLength == 10 ? 'selected' : '' }}>10</option>
                                <option value="25" {{ $pageLength == 25 ? 'selected' : '' }}>25</option>
                                <option value="50" {{ $pageLength == 50 ? 'selected' : '' }}>50</option>
                                <option value="100" {{ $pageLength == 100 ? 'selected' : '' }}>100</option>
                            </select>
                        </form>
                        <span class="text-gray-600 font-medium">entries</span>
                    </label>
                </div>
            </div>
            <!-- End Page Length and Button Add Item -->

            <!-- Search Bar -->
            <div class="flex justify-center items-center mb-4">
                <div class="relative w-80">
                    <form action="{{ route('user-location.index') }}" method="GET">
                        <input type="text" name="search" value="{{ $search ?? '' }}" class="pl-10 py-3 text-sm text-gray-900 border border-gray-300 rounded-full w-full bg-white focus:ring-blue-500 focus:border-blue-500 shadow-md" placeholder="Search">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i data-feather="search" class="text-gray-400"></i>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Search Bar -->
        </div>

        <!-- Table -->
        <div class="flex justify-center overflow-x-auto rounded-lg mt-6 w-full">
            <table class="min-w-full text-sm text-left text-gray-500 border-collapse rounded-lg shadow-md">
                <thead class="text-sm text-black uppercase bg-gradient-to-r from-[#FFC857] to-[#FFD369] border-b border-gray-300 rounded-t-lg">
                    <tr>
                        <th scope="col" class="px-6 py-4 border-b border-gray-300">LOCATION NAME</th>
                        <th scope="col" class="px-6 py-4 border-b border-gray-300">ID LOCATION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($locations as $item)
                    <tr class="bg-white hover:bg-[#FFF4E0] transition duration-300 border-b border-gray-300">
                        <td class="px-6 py-4 font-medium text-black border-gray-300">{{ $item->name }}</td>
                        <td class="px-6 py-4 font-medium text-black border-gray-300">{{ $item->tag }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- End Table -->



        <!-- Pagination -->
        <div class="flex justify-center mt-6 w-3/5 mx-auto">
            {{ $locations->appends(['search' => $search, 'pageLength' => $pageLength])->links('vendor.pagination.tailwind') }}
        </div>
        <!-- End Pagination -->

        @include('assets.js')

        <script>
            feather.replace();
        </script>
    </div>
</body>

</html>
