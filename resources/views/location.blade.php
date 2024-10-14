<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('assets.style')
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>LOCATION | PT. SUMBER INDAHPERKASA</title>
</head>
<body style="background-color: #F9FAFB; color: #2C3E50; font-family: 'Poppins', sans-serif;">
    @include('layout.side')
    <div class="p-4 sm:ml-64">
        <nav class="navbar navbar-light bg-white rounded-lg shadow-md p-4 mb-6 flex justify-between items-center">
            <a class="navbar-brand font-bold text-black text-3xl" style="font-family: 'Poppins';" href="#">
                LOCATION
            </a>
            <div class="flex items-center">
                <img src="../assets/img/logo-landing.png" alt="Company Logo" class="h-10 w-10 mr-3">
                <a href="#" class="font-bold text-black text-lg">PT. SUMBER INDAHPERKASA</a>
            </div>
        </nav>

        <!-- Search Bar -->
    <div class="flex justify-center items-center mb-4">
        <div class="relative w-96">
            <form action="{{ route('location.index') }}" method="GET">
                <input type="text" name="search" value="{{ $search ?? '' }}" class="pl-10 py-3 text-sm text-gray-900 border border-gray-300 rounded-full w-full bg-white focus:ring-blue-500 focus:border-blue-500 shadow-md" placeholder="Search for a location...">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i data-feather="search" class="text-gray-400"></i>
                </div>
            </form>
        </div>
    </div>
    <!-- End Search Bar -->

    @if ($errors->any())
    <div class="alert alert-danger bg-red-100 text-red-700 border border-red-400 p-4 rounded-md mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success bg-green-100 text-green-700 border border-green-400 p-4 rounded-md text-center mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Page Length and Button Add Item -->
    <div class="flex justify-between items-center mb-6 w-full max-w-4xl mx-auto">
        <div class="flex items-center space-x-4">
            <label class="flex items-center space-x-2">
                <span class="text-gray-600 font-medium">Show</span>
                <form action="{{ route('location.index') }}" method="GET">
                    <select name="pageLength" onchange="this.form.submit()" class="w-20 form-control input-sm border border-gray-300 rounded-full py-2 px-3 focus:ring-blue-500 focus:border-blue-500 bg-white shadow-md">
                        <option value="10" {{ $pageLength == 10 ? 'selected' : '' }}>10</option>
                        <option value="25" {{ $pageLength == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ $pageLength == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ $pageLength == 100 ? 'selected' : '' }}>100</option>
                    </select>
                </form>
                <span class="text-gray-600 font-medium">entries</span>
            </label>
        </div>
        <button type="button" class="focus:outline-none text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-full text-sm px-6 py-3 transition duration-300 shadow-md" onclick="openModal('add-modal')">Add Data</button>
    </div>
    <!-- End Page Length and Button Add Item -->

        <!-- Table -->
<div class="flex justify-center overflow-x-auto sm:rounded-lg">
    <table class="table-auto text-sm text-center text-gray-500 border-collapse rounded-xl shadow-md max-w-4xl w-full">
        <thead class="text-sm text-black uppercase bg-gradient-to-r from-[#FFC857] to-[#FFD369] border-b border-gray-300 rounded-t-xl">
            <tr>
                <th scope="col" class="px-6 py-4 border-b border-gray-300 rounded-tl-xl">
                    LOCATION NAME
                </th>
                <th scope="col" class="px-6 py-4 border-b border-gray-300">
                    ID LOCATION
                </th>
                <th scope="col" class="px-6 py-4 border-b border-gray-300 rounded-tr-xl">
                    ACTION
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($locations as $item)
            <tr class="bg-white hover:bg-[#FFF4E0] transition duration-300 border-b border-gray-300">
                <td class="px-6 py-4 font-medium text-black border-gray-300 text-center">
                    {{ $item->name }}
                </td>
                <td class="px-6 py-4 font-medium text-black border-gray-300 text-center">
                    {{ $item->tag }}
                </td>
                <td class="px-4 py-3 text-center">
                    <button type="button" class="focus:outline-none text-white bg-green-600 hover:bg-green-700 font-medium rounded-full text-sm px-5 py-2 transition duration-300 shadow-md" onclick="openModal('edit-modal-{{ $item->id }}')">Edit</button>
                    <button type="button" class="focus:outline-none text-white bg-red-600 hover:bg-red-700 font-medium rounded-full text-sm px-5 py-2 transition duration-300 shadow-md" onclick="openModal('delete-modal-{{ $item->id }}')">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- End Table -->



        <!-- Pagination -->
        <div class="flex justify-center mt-6">
            {{ $locations->appends(['search' => $search, 'pageLength' => $pageLength])->links('vendor.pagination.tailwind') }}
        </div>
        <!-- End Pagination -->

        <!-- Modal Tambah -->
        <div id="add-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white p-6 rounded-lg w-96 shadow-lg">
                <h2 class="text-xl font-bold mb-4">Add Location Data</h2>
                <form action="{{ route('location.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Location Name</label>
                        <input type="text" name="name" id="name" class="mt-1 block w-full rounded-full border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="tag" class="block text-sm font-medium text-gray-700">ID Location</label>
                        <input type="text" name="tag" id="tag" class="mt-1 block w-full rounded-full border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-full mr-2 transition duration-300" onclick="closeModal('add-modal')">Cancel</button>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-full transition duration-300">Save</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Modal -->

        <!-- Edit Modal -->
        @foreach ($locations as $item)
        <div id="edit-modal-{{ $item->id }}" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white p-6 rounded-lg w-96 shadow-lg">
                <h2 class="text-xl font-bold mb-4">Edit Location Data</h2>
                <form action="{{ route('location.update', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Location Name</label>
                        <input type="text" name="name" id="name" value="{{ $item->name }}" class="mt-1 block w-full rounded-full border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="tag" class="block text-sm font-medium text-gray-700">ID Location</label>
                        <input type="text" name="tag" id="tag" value="{{ $item->tag }}" class="mt-1 block w-full rounded-full border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-full mr-2 transition duration-300" onclick="closeModal('edit-modal-{{ $item->id }}')">Cancel</button>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-full transition duration-300">Save</button>
                    </div>
                </form>
            </div>
        </div>
        @endforeach
        <!-- End Edit Modal -->

        <!-- Delete Modal -->
        @foreach ($locations as $item)
        <div id="delete-modal-{{ $item->id }}" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white p-6 rounded-lg w-96 shadow-lg">
                <h2 class="text-xl font-bold mb-4">Delete Location Data</h2>
                <p class="mb-4">Are you sure you want to delete this data?</p>
                <div class="flex justify-end">
                    <button type="button" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-full mr-2 transition duration-300" onclick="closeModal('delete-modal-{{ $item->id }}')">Cancel</button>
                    <form action="{{ route('location.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-full transition duration-300">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        <!-- End Delete Modal -->
    </div>
    @include('assets.js')
</body>
</html>
