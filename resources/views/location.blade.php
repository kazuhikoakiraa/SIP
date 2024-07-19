<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('assets.style')
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>LOCATION | PT. SUMBER INDAHPERKASA</title>
</head>

<body">
    @include('layout.side')
    @include('layout.nav')

    <div class="p-4 md:ml-64 lg:ml-64">
        <!-- Search Bar -->
        <div class="flex justify-center items-center mb-4 -ml-3">
            <div class="relative w-80">
                <input type="text" id="table-search" class="pl-10 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg w-full bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i data-feather="search"></i>
                </div>
            </div>
        </div>
        <!-- End Search Bar -->

        <!-- Page Length and Button Add Item -->
        <div class="flex justify-center md:-mb-3">
            <div class="flex items-center space-x-3 md:justify-between md:space-x-40 lg:space-x-96">
                <label class="flex items-center space-x-1.5 mb-4 -ml-7 md:mb-0">
                    <span>Show</span>
                    <select name="kelas_length" aria-controls="kelas" class="w-16 form-control input-sm border border-gray-300 rounded-lg py-1 px-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
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
                                <a href="#">
                                    <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg>
                                </a>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 border-1 border-black whitespace-nowrap">
                            <div class="flex items-center">
                                ID LOCATION
                                <a href="#">
                                    <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg>
                                </a>
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
                    <tr class="bg-white border-1 border-black">
                        <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                            Refinery 1
                        </td>
                        <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                            R114REF
                        </td>
                        <td class="px-2 py-2 text-center">
                            <button type="button" class="focus:outline-none text-black bg-green-600 font-medium rounded-lg text-sm px-8 py-2.5 mb-2" onclick="openModal('edit-modal')">Edit</button>
                            <button type="button" class="focus:outline-none text-black bg-red-600 font-medium rounded-lg text-sm px-6 py-2.5 lg:ml-4" onclick="openModal('delete-modal')">Delete</button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        <!-- end Table -->

        <br>
        <!-- Pagination -->
        <div class="flex flex-col items-center">
            <div class="flex flex-col items-center">
                <!-- Help text -->
                <span class="text-sm text-black">
                    Showing <span class="font-semibold text-black">1</span> to <span class="font-semibold text-black">10</span> of <span class="font-semibold text-black">100</span> Entries
                </span>
            </div>
            <br>
            <nav aria-label="Page navigation example">
                <ul class="inline-flex -space-x-px text-sm">
                    <li>
                        <a href="#" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                    </li>
                    <li>
                        <a href="#" aria-current="page" class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">2</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">3</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- end Pagination -->
    </div>

    <!-- Modal Tambah Data -->
    <div id="add-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-4 rounded-lg w-1/3">
            <h2 class="text-xl font-bold mb-4">Tambah Location</h2>
            <form id="add-form">
                <div class="mb-4">
                    <label for="location-name" class="block text-sm font-medium text-gray-700">Location Name</label>
                    <input type="text" id="location-name" name="location-name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div class="mb-4">
                    <label for="location-id" class="block text-sm font-medium text-gray-700">ID Location</label>
                    <input type="text" id="location-id" name="location-id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div class="flex justify-end">
                    <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-md mr-2" onclick="closeModal('add-modal')">Batal</button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit Data -->
    <div id="edit-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-4 rounded-lg w-1/3">
            <h2 class="text-xl font-bold mb-4">Edit Data</h2>
            <form id="edit-form">
                <div class="mb-4">
                    <label for="edit-location-name" class="block text-sm font-medium text-gray-700">Location Name</label>
                    <input type="text" id="edit-location-name" name="edit-location-name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div class="mb-4">
                    <label for="edit-location-id" class="block text-sm font-medium text-gray-700">ID Location</label>
                    <input type="text" id="edit-location-id" name="edit-location-id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div class="flex justify-end">
                    <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-md mr-2" onclick="closeModal('edit-modal')">Batal</button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Hapus Data -->
    <div id="delete-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-4 rounded-lg w-1/3">
            <h2 class="text-xl font-bold mb-4">Hapus Data</h2>
            <p class="mb-4">Apakah Anda yakin ingin menghapus data ini?</p>
            <div class="flex justify-end">
                <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-md mr-2" onclick="closeModal('delete-modal')">Batal</button>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">Simpan</button>
            </div>
        </div>
    </div>

    @include('assets.js')


</body>

</html>
