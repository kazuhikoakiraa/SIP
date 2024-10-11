<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER LOCATION | PT. SUMBER INDAHPERKASA</title>
    <!-- Internal CSS -->
    <style>
        /* General Styling */
        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Poppins';
            background-color: #f8f9fc;
            color: #3B4A6B;
        }

        /* Container & Title */
        .container {
            padding: 30px 50px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .title {
            font-size: 32px;
            font-weight: bold;
            color: #3B4A6B;
            border-bottom: 4px solid #FFC857;
            display: inline-block;
            padding-bottom: 5px;
        }

        /* Search Bar Styling */
        .search-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            padding: 10px 0;
        }

        .search-container form {
            display: flex;
            align-items: center;
        }

        .search-container input {
            padding: 12px 20px;
            border: 1px solid #ccc;
            border-radius: 25px;
            outline: none;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .search-container input:focus {
            border-color: #3B4A6B;
            box-shadow: 0 6px 12px rgba(59, 74, 107, 0.2);
        }

        .search-container i {
            margin-left: -30px;
            color: #999;
        }

        /* Dropdown Styling */
        .dropdown-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .dropdown-container select {
            padding: 10px 15px;
            border-radius: 25px;
            border: 1px solid #ccc;
            background-color: #fff;
            cursor: pointer;
            transition: border 0.3s ease-in-out;
            outline: none;
        }

        .dropdown-container select:focus {
            border-color: #3B4A6B;
            box-shadow: 0 6px 12px rgba(59, 74, 107, 0.2);
        }

        /* Table Styling */
        .table-container {
            overflow-x: auto;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            text-align: left;
            padding: 15px 20px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3B4A6B;
            color: white;
        }

        td {
            background-color: white;
            color: #333;
            transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
        }

        tr:hover td {
            background-color: #f2f2f2;
        }

        /* Table Row Effect */
        tr:hover td {
            background-color: #EEF2F7;
            color: #3B4A6B;
            transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
        }

        /* Pagination Styling */
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            gap: 10px;
        }

        .pagination a, .pagination span {
            padding: 10px 15px;
            border: 1px solid #ddd;
            background-color: #fff;
            color: #3B4A6B;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
        }

        .pagination a:hover, .pagination span:hover {
            background-color: #3B4A6B;
            color: #fff;
        }

        .pagination .active {
            background-color: #3B4A6B;
            color: #fff;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            .title {
                font-size: 28px;
            }

            .search-container input {
                width: 200px;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 10px;
            }

            .title {
                font-size: 24px;
            }

            .search-container input {
                width: 150px;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar Component (Include dari template jika ada) -->
    @include('layout.user-nav')

<<<<<<< HEAD
    <!-- Main Content -->
    <div class="container">
        <h1 class="title">LOCATION</h1>

        <!-- Page Length and Search Bar -->
        <div class="search-container">
            <div class="dropdown-container">
                <form action="{{route('user-location.index')}}" method="GET">
                    <label>
                        <span>Show</span>
                        <select name="pageLength" onchange="this.form.submit()">
                            <option value="10" {{ $pageLength == 10 ? 'selected' : '' }}>10</option>
                            <option value="25" {{ $pageLength == 25 ? 'selected' : '' }}>25</option>
                            <option value="50" {{ $pageLength == 50 ? 'selected' : '' }}>50</option>
                            <option value="100" {{ $pageLength == 100 ? 'selected' : '' }}>100</option>
                        </select>
                        <span>entries</span>
                    </label>
                </form>
            </div>

            <form action="{{ route('user-location.index') }}" method="GET">
                <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search">
                <i data-feather="search"></i>
            </form>
=======
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
>>>>>>> parent of e201aee (push css edit)
        </div>
        <!-- End Search Bar -->

<<<<<<< HEAD
        <!-- Table Data -->
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>LOCATION NAME</th>
                        <th>ID LOCATION</th>
=======
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
>>>>>>> parent of e201aee (push css edit)
                    </tr>
                </thead>
                <tbody>
                    @foreach ($locations as $item)
<<<<<<< HEAD
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->tag }}</td>
=======
                    <tr class="bg-white border-1 border-black">
                        <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                            {{ $item->name }}
                        </td>
                        <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                            {{ $item->tag }}
                        </td>
>>>>>>> parent of e201aee (push css edit)
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            {{ $locations->appends(['search' => $search, 'pageLength' => $pageLength])->links('vendor.pagination.tailwind') }}
        </div>
    </div>

    <!-- Feather Icons -->
    <script>
        feather.replace(); // Untuk mengganti icon feather
    </script>
</body>

</html>
