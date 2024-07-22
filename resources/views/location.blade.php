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
    @include('layout.nav')

    <div class="p-4 md:ml-64 lg:ml-64">
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

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Page Length and Button Add Item -->
        <div class="flex justify-center md:-mb-3">
            <div class="flex items-center space-x-3 md:justify-between md:space-x-40 lg:space-x-96">
                <label class="flex items-center space-x-1.5 mb-4 -ml-7 md:mb-0">
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
                <button type="button" class="focus:outline-none text-white bg-blue-600 font-medium rounded-lg text-sm px-4 py-2 mb-4" onclick="openModal('add-modal')">Tambah Data</button>
            </div>
        </div>
        <!-- End Page Length and Button Add Item -->

        <!-- Table -->
        <div class="flex justify-center overflow-x-auto sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 lg:w-2/3 md:justify-center lg:justify-center ml-32 md:ml-0 lg:ml-0">
                <thead class="text-sm text-black uppercase bg-white border-1 border-black ">
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
                        <th scope="col" class="px-6 py-3 text-center">
                            <div>
                                AKSI
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
                        <td class="px-2 py-2 text-center">
                            <button type="button" class="focus:outline-none text-black bg-green-600 font-medium rounded-lg text-sm px-8 py-2.5 mb-2" onclick="openModal('edit-modal-{{ $item->id }}')">Edit</button>
                            <button type="button" class="focus:outline-none text-black bg-red-600 font-medium rounded-lg text-sm px-6 py-2.5 lg:ml-4" onclick="openModal('delete-modal-{{ $item->id }}')">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- End Table -->

        <!-- Pagination -->
        <div class="flex justify-center mt-4">
            {{ $locations->appends(['search' => $search, 'pageLength' => $pageLength])->links() }}
        </div>
        <!-- End Pagination -->

        <!-- Modal untuk Tambah, Edit, dan Hapus tetap sama seperti sebelumnya -->
        <div id="add-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-gray-800 bg-opacity-75">
            <div class="bg-white rounded-lg w-96">
                <div class="p-4 border-b">
                    <h2 class="text-lg font-semibold">Add Data</h2>
                </div>
                <div class="p-4">
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
                            <button type="button" class="text-gray-600 hover:text-gray-900 mr-4" onclick="closeModal('add-modal')">Cancel</button>
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Modal -->
        <!-- Edit -->
        @foreach ($locations as $item)
        <div id="edit-modal-{{ $item->id }}" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-gray-800 bg-opacity-75">
            <div class="bg-white rounded-lg w-96">
                <div class="p-4 border-b">
                    <h2 class="text-lg font-semibold">Edit Data</h2>
                </div>
                <div class="p-4">
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
                            <button type="button" class="text-gray-600 hover:text-gray-900 mr-4" onclick="closeModal('edit-modal-{{ $item->id }}')">Cancel</button>
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        <!-- End Edit -->
        <!-- Delete -->
        @foreach ($locations as $item)
        <div id="delete-modal-{{ $item->id }}" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-gray-800 bg-opacity-75">
            <div class="bg-white rounded-lg w-96">
                <div class="p-4 border-b">
                    <h2 class="text-lg font-semibold">Hapus Data</h2>
                </div>
                <div class="p-4">
                    <p>Apakah anda yakin ingin menghapus data ini?</p>
                    <div class="flex justify-end mt-4">
                        <button type="button" class="text-gray-600 hover:text-gray-900 mr-4" onclick="closeModal('delete-modal-{{ $item->id }}')">Cancel</button>
                        <form action="{{ route('location.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <!-- End Delete -->
    </div>
    @include('assets.js')

    <script>
        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }
    </script>

</body>

</html>
