<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('assets.style')
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>GEAR | PT. SUMBER INDAHPERKASA</title>
</head>
<body">
    @include('layout.side')
    <div class="p-2 sm:ml-64">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand font-bold" style="font-family: 'Poppins';" href="#">
                    EQUIPMENT - GEAR
                </a>
                <div class="align-text-top inline-flex md:ml-36 lg:ml-36 hidden sm:flex md:flex lg:flex">
                    <img src="../assets/img/logo-landing.png" alt="" class="h-8 w-8 p-1">
                    <a href="" class="font-bold p-1">PT. SUMBER INDAHPERKASA</a>
                </div>
            </div>
        </nav>
    </div>

    <div class="p-4 sm:ml-64 md:ml-64 lg:ml-64">
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

        <!-- Page Lenght and Button Add Item -->
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
                <button type="button" class="focus:outline-none text-white bg-blue-600 font-medium rounded-lg text-sm px-4 py-2 mb-4" onclick="openModal('add-gear')">Tambah Data</button>
            </div>
        </div>
        <!-- End Page Lenght and Button Add Item -->

        <!-- Table -->
        <div class="flex justify-start overflow-x-auto sm:rounded-lg" >
        <table class="text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-sm text-black uppercase bg-white border-1 border-black">
                <tr>
                    <th scope="col" class="px-6 py-3 border-1 border-black whitespace-nowrap">
                        <div class="flex items-center">
                           SAP ID
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 border-1 border-black whitespace-nowrap">
                        <div class="flex items-center">
                            IMAGE
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 border-1 border-black whitespace-nowrap">
                        <div class="flex items-center">
                            EQUIPMENT NAME
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 border-1 border-black whitespace-nowrap">
                        <div class="flex items-center">
                            TAG ID
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 border-1 border-black whitespace-nowrap">
                        <div class="flex items-center">
                            LOCATION
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 border-1 border-black whitespace-nowrap">
                        <div class="flex items-center">
                            BRAND
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 border-1 border-black whitespace-nowrap">
                        <div class="flex items-center">
                            MODEL
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 border-1 border-black whitespace-nowrap">
                        <div class="flex items-center">
                            CAPACITY (m3/hr)
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 border-1 border-black whitespace-nowrap">
                        <div class="flex items-center">
                            HEAD (m)
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 border-1 border-black whitespace-nowrap">
                        <div class="flex items-center">
                            COUPLING
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 border-1 border-black whitespace-nowrap">
                        <div class="flex items-center">
                            FRONT BEARING
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 border-1 border-black whitespace-nowrap">
                        <div class="flex items-center">
                            REAR BEARING
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 border-1 border-black whitespace-nowrap">
                        <div class="flex items-center">
                            IMPELER SIZE (mm)
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 border-1 border-black whitespace-nowrap">
                        <div class="flex items-center">
                            OIL
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 border-1 border-black whitespace-nowrap">
                        <div class="flex items-center">
                            OIL SEAL
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 border-1 border-black whitespace-nowrap">
                        <div class="flex items-center">
                            GREASE
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 border-1 border-black whitespace-nowrap">
                        <div class="flex items-center">
                            MECH SEAL
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 border-1 border-black whitespace-nowrap">
                        <div class="flex items-center">
                            NOTE
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
                    <td scope="row" class=" px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                        <div class="flex justify-center items-center">
                            <img class="w-10 h-10 rounded-sm" src="../assets/img/logo-landing.png" alt="equipment">
                        </div>
                    </td>
                    <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                        R114REF                    
                    </td>
                    <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                        R114REF                    
                    </td>
                    <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                        R114REF                    
                    </td>
                    <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                        R114REF                    
                    </td>
                    <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                        R114REF                    
                    </td>
                    <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                        R114REF                    
                    </td>
                    <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                        R114REF                    
                    </td>
                    <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                        R114REF                    
                    </td>
                    <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                        R114REF                    
                    </td>
                    <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                        R114REF                    
                    </td>
                    <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                        R114REF                    
                    </td>
                    <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                        R114REF                    
                    </td>
                    <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                        R114REF                    
                    </td>
                    <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                        R114REF                    
                    </td>
                    <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                        R114REF                    
                    </td><td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                        R114REF                    
                    </td>
                    <td class="px-2 py-2 text-center">
                        <button type="button" class="focus:outline-none text-black bg-green-600 font-medium rounded-lg text-sm px-8 py-2.5 mb-2" onclick="openModal('edit-gear')">Edit</button>
                        <button type="button" class="focus:outline-none text-black bg-red-600 font-medium rounded-lg text-sm px-6 py-2.5" onclick="openModal('delete-gear')">Delete</button>
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
        <div id="add-gear" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 overflow-y-auto">
            <div class="bg-white p-4 rounded-lg w-full h-1/2 sm:w-full md:w-1/2 lg:w-1/2 max-h-full overflow-y-auto">
                <h2 class="text-xl font-bold mb-4">Tambah Data Gear</h2>
                <form id="add-form">
                    <div class="flex flex-col md:flex-row gap-4 mb-2">
                        <div class="flex-1">
                            <label for="sap-gear" class="block text-sm font-medium text-gray-700">SAP ID</label>
                            <input type="text" id="sap-gear" name="sap-gear" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="flex-1">
                            <label for="gear-image" class="block text-sm font-medium text-gray-700">Gambar Gear</label>
                            <input type="file" id="gear-image" name="gear-image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-4 mb-2">
                        <div class="flex-1">
                            <label for="gear-name" class="block text-sm font-medium text-gray-700">Equipment Name</label>
                            <input type="text" id="gear-name" name="gear-name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="flex-1">
                            <label for="gear-id" class="block text-sm font-medium text-gray-700">Gear ID</label>
                            <input type="text" id="gear-id" name="gear-id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-4 mb-2">
                        <div class="flex-1">
                            <label for="gear-location" class="block text-sm font-medium text-gray-700">Location</label>
                            <select id="gear-location" name="gear-location" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm h-10">
                                <option selected="">Select Location</option>
                                <option value="Refinary 1">Refinary 1</option>
                                <option value="WTP">WTP</option>
                                <option value="Fractination">Fractination</option>
                            </select>
                        </div>
                        <div class="flex-1">
                            <label for="gear-brand" class="block text-sm font-medium text-gray-700">Brand</label>
                            <input type="text" id="gear-brand" name="gear-brand" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm h-10">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-4 mb-2">
                        <div class="flex-1">
                            <label for="gear-model" class="block text-sm font-medium text-gray-700">Model</label>
                            <input type="text" id="gear-model" name="gear-model" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="flex-1">
                            <label for="gear-capacity" class="block text-sm font-medium text-gray-700">Capacity</label>
                            <input type="text" id="gear-capacity" name="gear-capacity" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-4 mb-2">
                        <div class="flex-1">
                            <label for="gear-head" class="block text-sm font-medium text-gray-700">Head</label>
                            <input type="text" id="gear-head" name="gear-head" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="flex-1">
                            <label for="gear-coupling" class="block text-sm font-medium text-gray-700">Coupling</label>
                            <input type="text" id="gear-coupling" name="gear-coupling" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="flex-1">
                            <label for="gear-front" class="block text-sm font-medium text-gray-700">Front-Bearing</label>
                            <input type="text" id="gear-front" name="gear-front" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-4 mb-2">
                        <div class="flex-1">
                            <label for="gear-rear" class="block text-sm font-medium text-gray-700">Rear-Bearing</label>
                            <input type="text" id="gear-rear" name="gear-rear" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="flex-1">
                            <label for="gear-impeler" class="block text-sm font-medium text-gray-700">Impeler Size</label>
                            <input type="text" id="gear-impeler" name="gear-impeler" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="flex-1">
                            <label for="gear-oil" class="block text-sm font-medium text-gray-700">Oil</label>
                            <input type="text" id="gear-oil" name="gear-oil" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-4 mb-2">
                        <div class="flex-1">
                            <label for="gear-seal" class="block text-sm font-medium text-gray-700">Oil Seal</label>
                            <input type="text" id="gear-seal" name="gear-seal" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="flex-1">
                            <label for="gear-grease" class="block text-sm font-medium text-gray-700">Grease</label>
                            <input type="text" id="gear-grease" name="gear-grease" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="flex-1">
                            <label for="gear-mech" class="block text-sm font-medium text-gray-700">Mech-Seal</label>
                            <input type="text" id="gear-mech" name="gear-mech" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="note" class="block text-sm font-medium text-gray-700">Note</label>
                        <textarea rows="4" id="note" name="note" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-md mr-2" onclick="closeModal('add-gear')">Batal</button>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

    <!-- Modal Edit Data -->
    <div id="edit-gear" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 overflow-y-auto">
            <div class="bg-white p-4 rounded-lg w-full h-1/2 sm:w-full md:w-1/2 lg:w-1/2 max-h-full overflow-y-auto">
                <h2 class="text-xl font-bold mb-4">Edit Data Gear</h2>
                <div class="flex flex-col md:flex-row gap-4 mb-2">
                        <div class="flex-1">
                            <label for="sap-gear" class="block text-sm font-medium text-gray-700">SAP ID</label>
                            <input type="text" id="sap-gear" name="sap-gear" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="flex-1">
                            <label for="gear-image" class="block text-sm font-medium text-gray-700">Gambar Gear</label>
                            <input type="file" id="gear-image" name="gear-image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-4 mb-2">
                        <div class="flex-1">
                            <label for="gear-name" class="block text-sm font-medium text-gray-700">Equipment Name</label>
                            <input type="text" id="gear-name" name="gear-name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="flex-1">
                            <label for="gear-id" class="block text-sm font-medium text-gray-700">Gear ID</label>
                            <input type="text" id="gear-id" name="gear-id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-4 mb-2">
                        <div class="flex-1">
                            <label for="gear-location" class="block text-sm font-medium text-gray-700">Location</label>
                            <select id="gear-location" name="gear-location" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm h-10">
                                <option selected="">Select Location</option>
                                <option value="Refinary 1">Refinary 1</option>
                                <option value="WTP">WTP</option>
                                <option value="Fractination">Fractination</option>
                            </select>
                        </div>
                        <div class="flex-1">
                            <label for="gear-brand" class="block text-sm font-medium text-gray-700">Brand</label>
                            <input type="text" id="gear-brand" name="gear-brand" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-4 mb-2">
                        <div class="flex-1">
                            <label for="gear-model" class="block text-sm font-medium text-gray-700">Model</label>
                            <input type="text" id="gear-model" name="gear-model" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="flex-1">
                            <label for="gear-capacity" class="block text-sm font-medium text-gray-700">Capacity</label>
                            <input type="text" id="gear-capacity" name="gear-capacity" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-4 mb-2">
                        <div class="flex-1">
                            <label for="gear-head" class="block text-sm font-medium text-gray-700">Head</label>
                            <input type="text" id="gear-head" name="gear-head" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="flex-1">
                            <label for="gear-coupling" class="block text-sm font-medium text-gray-700">Coupling</label>
                            <input type="text" id="gear-coupling" name="gear-coupling" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="flex-1">
                            <label for="gear-front" class="block text-sm font-medium text-gray-700">Front-Bearing</label>
                            <input type="text" id="gear-front" name="gear-front" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-4 mb-2">
                        <div class="flex-1">
                            <label for="gear-rear" class="block text-sm font-medium text-gray-700">Rear-Bearing</label>
                            <input type="text" id="gear-rear" name="gear-rear" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="flex-1">
                            <label for="gear-impeler" class="block text-sm font-medium text-gray-700">Impeler Size</label>
                            <input type="text" id="gear-impeler" name="gear-impeler" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="flex-1">
                            <label for="gear-oil" class="block text-sm font-medium text-gray-700">Oil</label>
                            <input type="text" id="gear-oil" name="gear-oil" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-4 mb-2">
                        <div class="flex-1">
                            <label for="gear-seal" class="block text-sm font-medium text-gray-700">Oil Seal</label>
                            <input type="text" id="gear-seal" name="gear-seal" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="flex-1">
                            <label for="gear-grease" class="block text-sm font-medium text-gray-700">Grease</label>
                            <input type="text" id="gear-grease" name="gear-grease" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="flex-1">
                            <label for="gear-mech" class="block text-sm font-medium text-gray-700">Mech-Seal</label>
                            <input type="text" id="gear-mech" name="gear-mech" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="note" class="block text-sm font-medium text-gray-700">Note</label>
                        <textarea rows="4" id="note" name="note" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-md mr-2" onclick="closeModal('edit-gear')">Batal</button>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">Edit</button>
                    </div>
                </form>
            </div>
        </div>

    <!-- Modal Hapus Data -->
    <div id="delete-gear" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-4 rounded-lg w-1/3">
            <h2 class="text-xl font-bold mb-4">Hapus Data Gear</h2>
            <p class="mb-4">Apakah Anda yakin ingin menghapus data ini?</p>
            <div class="flex justify-end">
                <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-md mr-2" onclick="closeModal('delete-gear')">Batal</button>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">Delete</button>
            </div>
        </div>
    </div>
    
    @include('assets.js')
</body>
</html>
