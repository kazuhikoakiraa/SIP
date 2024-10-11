<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('assets.style')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>LOCATION | PT. SUMBER INDAHPERKASA</title>
</head>

<body>

    @include('layout.side')
    <div class="p-2 sm:ml-64">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand font-bold" style="font-family: 'Poppins';" href="#">
                    LOCATION
                </a>
                <div class="align-text-top inline-flex md:ml-36 lg:ml-36 hidden sm:flex md:flex lg:flex">
                    <img src="../assets/img/logo-landing.png" alt="" class="h-8 w-8 p-1">
                    <a href="" class="font-bold p-1">PT. SUMBER INDAHPERKASA</a>
                </div>
            </div>
        </nav>


    <div class="mt-5">
        <!-- Search Bar -->
        <div class="flex justify-center items-center mb-4 -ml-3">
            <div class="relative w-80">
                <form action="{{ route('location.index') }}" method="GET">
                    <input type="text" name="search" value="{{ $search ?? '' }}" class="pl-10 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg w-full bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i data-feather="search"></i>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Search Bar -->

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
        @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        <!-- Page Length and Button Add Item -->
        <div class="flex justify-center md:-mb-3">
                <div class="flex items-center space-x-12 md:justify-between md:space-x-40 lg:space-x-96">
                    <label class="flex items-center space-x-1.5 mb-4 md:mb-0">
                    <span>Show</span>
                    <form action="{{ route('location.index') }}" method="GET">
                        <select name="pageLength" onchange="this.form.submit()" class="w-16 form-control input-sm border border-gray-300 rounded-lg py-1 px-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="10" {{ $pageLength == 10 ? 'selected' : '' }}>10</option>
                            <option value="25" {{ $pageLength == 25 ? 'selected' : '' }}>25</option>
                            <option value="50" {{ $pageLength == 50 ? 'selected' : '' }}>50</option>
                            <option value="100" {{ $pageLength == 100 ? 'selected' : '' }}>100</option>
                        </select>
                    </form>
                    <span>entries</span>
                </label>
                <button type="button" class="focus:outline-none text-white bg-blue-600 font-medium rounded-lg text-sm px-4 py-2 mb-4" onclick="openModal('add-modal')">Add Data</button>
            </div>
        </div>
        <!-- End Page Length and Button Add Item -->

        <!-- Table -->
        <div class="flex flex-col mt-6 px-2">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden border border-gray-200 md:rounded-lg mx-2">
                    <table class="min-w-full divide-y divide-gray-200 ">
                <thead class="bg-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-3 border-1 border-gray-300 whitespace-nowrap">
                            <div class="flex items-center">
                                LOCATION NAME
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 border-1 border-gray-300 whitespace-nowrap">
                            <div class="flex items-center">
                                ID LOCATION
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 border-1 border-gray-300 whitespace-nowrap text-center">
                            <div>
                                ACTION
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($locations as $item)
                    <tr class="bg-white border-1 border-gray-300">
                        <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-gray-300 text-black">
                            {{ $item->name }}
                        </td>
                        <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-gray-300 text-black">
                            {{ $item->tag }}
                        </td>
                        <td class="px-2 py-2 text-center">
                            <button type="button" class="focus:outline-none text-black bg-green-600 font-medium rounded-lg text-sm px-8 py-2.5 mb-2" onclick="openModal('edit-modal-{{ $item->id }}')">Edit</button>
                            <button type="button" class="focus:outline-none text-black bg-red-600 font-medium rounded-lg text-sm px-6 py-2.5" onclick="openModal('delete-modal-{{ $item->id }}')">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- End Table -->

        <!-- Pagination -->
        <div class="flex justify-center mt-4">
            {{ $locations->appends(['search' => $search, 'pageLength' => $pageLength])->links('vendor.pagination.tailwind') }}
        </div>

        <!-- End Pagination -->

        <!-- Modal Tambah-->
        <div id="add-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white p-4 rounded-lg w-96">
                    <h2 class="text-lg font-semibold">Add Location Data</h2>
                <div>
                    <form action="{{ route('location.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Location Name</label>
                            <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="tag" class="block text-sm font-medium text-gray-700">ID Location</label>
                            <input type="text" name="tag" id="tag" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        </div>
                        <div class="flex justify-end">
                            <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-md mr-2" onclick="closeModal('add-modal')">Cancel</button>
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Modal -->

        <!-- Edit -->
        @foreach ($locations as $item)
        <div id="edit-modal-{{ $item->id }}" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white p-4 rounded-lg w-96">
                    <h2 class="text-xl font-bold mb-4">Edit Location Data</h2>
                <div>
                    <form action="{{ route('location.update', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Location Name</label>
                            <input type="text" name="name" id="name" value="{{ $item->name }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="tag" class="block text-sm font-medium text-gray-700">ID Location</label>
                            <input type="text" name="tag" id="tag" value="{{ $item->tag }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        </div>
                        <div class="flex justify-end">
                            <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-md mr-2" onclick="closeModal('edit-modal-{{ $item->id }}')">Cancel</button>
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        <!-- End Edit -->

        <!-- Delete -->
        @foreach ($locations as $item)
        <div id="delete-modal-{{ $item->id }}" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white p-4 rounded-lg w-96">
                    <h2 class="text-xl font-bold mb-4">Delete Location Data</h2>
                    <p class="mb-4">Are you sure you want to delete this data?</p>
                    <div class="flex justify-end">
                        <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-md mr-2" onclick="closeModal('delete-modal-{{ $item->id }}')">Cancel</button>
                        <form action="{{ route('location.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <!-- End Delete -->
    </div>
    </div>
    @include('assets.js')

</body>

</html>
