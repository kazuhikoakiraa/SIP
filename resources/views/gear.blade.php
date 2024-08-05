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


    <div class="mt-5">
        <!-- Search Bar -->
        <div class="flex justify-center items-center mb-4 -ml-3">
            <div class="relative w-80">
                <form action="{{ route('gear.index') }}" method="GET">
                    <input type="text" name="search" value="{{ $search ?? '' }}" class="pl-10 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg w-full bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i data-feather="search"></i>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Search Bar -->

        @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

        <!-- Page Lenght and Button Add Item -->
        <div class="flex justify-center md:-mb-3">
            <div class="flex items-center space-x-14 md:justify-between md:space-x-40 lg:space-x-96">
                <label class="flex items-center space-x-1.5 mb-4 -ml-7 md:mb-0">
                    <span>Show</span>
                    <form action="{{route('gear.index')}}" method="GET">
                        <select name="pageLength" onchange="this.form.submit()" class="w-16 form-control input-sm border border-gray-300 rounded-lg py-1 px-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="10" {{ $pageLength == 10 ? 'selected' : '' }}>10</option>
                            <option value="25" {{ $pageLength == 25 ? 'selected' : '' }}>25</option>
                            <option value="50" {{ $pageLength == 50 ? 'selected' : '' }}>50</option>
                            <option value="100" {{ $pageLength == 100 ? 'selected' : '' }}>100</option>
                        </select>
                    </form>
                    <span>entries</span>
                </label>
                <button type="button" class="focus:outline-none text-white bg-blue-600 font-medium rounded-lg text-sm px-4 py-2 mb-4" onclick="openModal('add-gear')">Add Data</button>
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
                            ACTION
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gearbox as $item)

                <tr class="bg-white border-1 border-black">
                    <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                        {{$item->sap_id}}
                    </td>
                    <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                        @if($item->img)
                            <img class="w-10 h-10 rounded-sm cursor-pointer" src="{{ asset('assets/img/' . $item->img) }}" alt="Gear Image" onclick="openImageModal('{{ asset('assets/img/' . $item->img) }}')">
                        @else
                            <img class="w-10 h-10 rounded-sm cursor-pointer" src="{{ asset('assets/img/default.png') }}" alt="Default Image" onclick="openImageModal('{{ asset('assets/img/default.png') }}')">
                        @endif
                    </td>
                    <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                        {{$item->name}}
                    </td>
                    <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                        {{$item->tag_id}}
                    </td>
                    <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                        {{$item->location->name }}
                    </td>
                    <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                        {{$item->brand}}
                    </td>
                    <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                        {{$item->model}}
                    </td>
                    <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                        {{$item->capacity}}
                    </td>
                    <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                        {{$item->head}}
                    </td>
                    <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                        {{$item->coupling}}
                    </td>
                    <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                        {{$item->front_bearing}}
                    </td>
                    <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                        {{$item->rear_bearing}}
                    </td>
                    <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                        {{$item->impeler}}
                    </td>
                    <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                        {{$item->oil}}
                    </td>
                    <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                        {{$item->oil_seal}}
                    </td>
                    <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                        {{$item->grease}}
                    </td>
                    <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                        {{$item->mech_seal}}
                    </td><td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                        {{$item->note}}
                    </td>
                    <td class="px-2 py-2 text-center">
                        <button type="button" class="focus:outline-none text-black bg-green-600 font-medium rounded-lg text-sm px-8 py-2.5 mb-2" onclick="openModal('edit-gear-{{$item->id}}')">Edit</button>
                        <button type="button" class="focus:outline-none text-black bg-red-600 font-medium rounded-lg text-sm px-6 py-2.5" onclick="openModal('delete-gear-{{$item->id}}')">Delete</button>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
        </div>
    </div>
        <!-- end Table -->

        <!-- Pagination -->
        <div class="flex justify-center mt-4">
            {{ $gearbox->appends(['search' => $search, 'pageLength' => $pageLength])->links('vendor.pagination.tailwind') }}
        </div>

         <!-- End Pagination -->

        <!-- Modal Tambah Data -->
        <div id="add-gear" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 overflow-y-auto">
            <div class="bg-white p-4 rounded-lg w-full h-1/2 sm:w-full md:w-1/2 lg:w-1/2 max-h-full overflow-y-auto">
                <h2 class="text-xl font-bold mb-4">Add Gearbox Data</h2>
                <form action="{{route('gear.store')}}" method="POST" enctype="multipart/form-data" id="add-form">
                    @csrf
                    <div class="flex flex-col md:flex-row gap-4 mb-2">
                        <div class="flex-1">
                            <label for="sap_id" class="block text-sm font-medium text-gray-700">SAP ID</label>
                            <input type="text" id="sap_id" name="sap_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="flex-1">
                            <label for="img" class="block text-sm font-medium text-gray-700">Image</label>
                            <input type="file" id="img" name="img" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-4 mb-2">
                        <div class="flex-1">
                            <label for="name" class="block text-sm font-medium text-gray-700">Equipment Name</label>
                            <input type="text" id="name" name="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="flex-1">
                            <label for="tag_id" class="block text-sm font-medium text-gray-700">TAG ID</label>
                            <input type="text" id="tag_id" name="tag_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-4 mb-2">
                        <div class="flex-1">
                            <label for="location_id" class="block text-sm font-medium text-gray-700">Location</label>
                            <select id="location_id" name="location_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                <option selected="">Select Location</option>
                                @foreach ($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex-1">
                            <label for="brand" class="block text-sm font-medium text-gray-700">Brand</label>
                            <input type="text" id="brand" name="brand" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-4 mb-2">
                        <div class="flex-1">
                            <label for="model" class="block text-sm font-medium text-gray-700">Model</label>
                            <input type="text" id="model" name="model" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="flex-1">
                            <label for="capacity" class="block text-sm font-medium text-gray-700">Capacity</label>
                            <input type="text" id="capacity" name="capacity" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-4 mb-2">
                        <div class="flex-1">
                            <label for="head" class="block text-sm font-medium text-gray-700">Head</label>
                            <input type="text" id="head" name="head" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="flex-1">
                            <label for="coupling" class="block text-sm font-medium text-gray-700">Coupling</label>
                            <input type="text" id="coupling" name="coupling" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="flex-1">
                            <label for="front_bearing" class="block text-sm font-medium text-gray-700">Front-Bearing</label>
                            <input type="text" id="front_bearing" name="front_bearing" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-4 mb-2">
                        <div class="flex-1">
                            <label for="rear_bearing" class="block text-sm font-medium text-gray-700">Rear-Bearing</label>
                            <input type="text" id="rear_bearing" name="rear_bearing" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="flex-1">
                            <label for="impeler" class="block text-sm font-medium text-gray-700">Impeler Size</label>
                            <input type="text" id="impeler" name="impeler" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="flex-1">
                            <label for="oil" class="block text-sm font-medium text-gray-700">Oil</label>
                            <input type="text" id="oil" name="oil" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-4 mb-2">
                        <div class="flex-1">
                            <label for="oil_seal" class="block text-sm font-medium text-gray-700">Oil Seal</label>
                            <input type="text" id="oil_seal" name="oil_seal" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="flex-1">
                            <label for="grease" class="block text-sm font-medium text-gray-700">Grease</label>
                            <input type="text" id="grease" name="grease" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="flex-1">
                            <label for="mech_seal" class="block text-sm font-medium text-gray-700">Mech-Seal</label>
                            <input type="text" id="mech_seal" name="mech_seal" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="note" class="block text-sm font-medium text-gray-700">Note</label>
                        <textarea rows="4" id="note" name="note" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-md mr-2" onclick="closeModal('add-gear')">Cancel</button>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">Save</button>
                    </div>
                </form>
            </div>
        </div>

    <!-- Modal Edit Data -->
    @foreach ($gearbox as $item)
    <div id="edit-gear-{{$item->id}}" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 overflow-y-auto">
        <div class="bg-white p-4 rounded-lg w-full h-1/2 sm:w-full md:w-1/2 lg:w-1/2 max-h-full overflow-y-auto">
            <h2 class="text-xl font-bold mb-4">Edit Gearbox Data</h2>
            <form action="{{route('gear.update', $item->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="flex flex-col md:flex-row gap-4 mb-2">
                    <div class="flex-1">
                        <label for="sap _id" class="block text-sm font-medium text-gray-700">SAP ID</label>
                        <input type="text" id="sap _id" name="sap _id" value="{{old('sap_id', $item->sap_id)}}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    <div class="flex-1">
                        <label for="img" class="block text-sm font-medium text-gray-700">Image</label>
                        <input type="file" id="img" name="img" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                </div>
                <div class="flex flex-col md:flex-row gap-4 mb-2">
                    <div class="flex-1">
                        <label for="name" class="block text-sm font-medium text-gray-700">Equipment Name</label>
                        <input type="text" id="name" name="name" value="{{old('name',$item->name)}}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div class="flex-1">
                    <label for="tag_id" class="block text-sm font-medium text-gray-700">TAG ID</label>
                    <input type="text" id="tag_id" name="tag_id" value="{{old('tag_id', $item->tag_id)}}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
            </div>
            <div class="flex flex-col md:flex-row gap-4 mb-2">
                <div class="flex-1">
                    <label for="location_id" class="block text-sm font-medium text-gray-700">Location</label>
                    <select id="location_id" name="location_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="{{ $item->location_id }}" selected>{{ $item->location->name }}</option>
                        @foreach ($locations as $loc)
                            <option value="{{ $loc->id }}">{{ $loc->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex-1">
                    <label for="brand" class="block text-sm font-medium text-gray-700">Brand</label>
                    <input type="text" id="brand" name="brand" value="{{old('brand',$item->brand)}}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
            </div>
            <div class="flex flex-col md:flex-row gap-4 mb-2">
                <div class="flex-1">
                    <label for="model" class="block text-sm font-medium text-gray-700">Model</label>
                    <input type="text" id="model" name="model" value="{{old('model',$item->model)}}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div class="flex-1">
                    <label for="capacity" class="block text-sm font-medium text-gray-700">Capacity</label>
                    <input type="text" id="capacity" name="capacity" value="{{old('capacity', $item->capacity)}}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
            </div>
            <div class="flex flex-col md:flex-row gap-4 mb-2">
                <div class="flex-1">
                    <label for="head" class="block text-sm font-medium text-gray-700">Head</label>
                    <input type="text" id="head" name="head" value="{{old('head', $item->head)}}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div class="flex-1">
                    <label for="coupling" class="block text-sm font-medium text-gray-700">Coupling</label>
                    <input type="text" id="coupling" name="coupling" value="{{old('head',$item->coupling)}}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div class="flex-1">
                    <label for="front_bearing" class="block text-sm font-medium text-gray-700">Front-Bearing</label>
                    <input type="text" id="front_bearing" name="front_bearing" value="{{old('front_bearing',$item->front_bearing)}}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-4 mb-2">
                        <div class="flex-1">
                            <label for="rear_bearing" class="block text-sm font-medium text-gray-700">Rear-Bearing</label>
                            <input type="text" id="rear_bearing" name="rear_bearing" value="{{old('rear_bearing',$item->rear_bearing)}}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="flex-1">
                            <label for="impeler" class="block text-sm font-medium text-gray-700">Impeler Size</label>
                            <input type="text" id="impeler" name="impeler" value="{{old('impeler',$item->impeler)}}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="flex-1">
                            <label for="oil" class="block text-sm font-medium text-gray-700">Oil</label>
                            <input type="text" id="oil" name="oil" value="{{old('oil',$item->oil)}}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-4 mb-2">
                        <div class="flex-1">
                            <label for="oil_seal" class="block text-sm font-medium text-gray-700">Oil Seal</label>
                            <input type="text" id="oil_seal" name="oil_seal" value="{{old('oil_seal', $item->oil_seal)}}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="flex-1">
                            <label for="grease" class="block text-sm font-medium text-gray-700">Grease</label>
                            <input type="text" id="grease" name="grease" value="{{old('grease',$item->grease)}}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="flex-1">
                            <label for="mech_seal" class="block text-sm font-medium text-gray-700">Mech-Seal</label>
                            <input type="text" id="mech_seal" name="mech_seal" value="{{old('mech_seal',$item->mech_seal)}}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="note" class="block text-sm font-medium text-gray-700">Note</label>
                        <textarea rows="4" id="note" name="note" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">{{ old('note', $item->note) }}</textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-md mr-2" onclick="closeModal('edit-gear-{{$item->id}}')">Cancel</button>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">Save</button>
                    </div>
                </form>
            </div>
        </div>
        @endforeach

         <!-- Modal Hapus Data -->
         @foreach ($gearbox as $item)
         <div id="delete-gear-{{$item->id}}" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
             <div class="bg-white p-4 rounded-lg w-1/3">
                 <h2 class="text-xl font-bold mb-4">Delet Gearbox Data</h2>
                 <p class="mb-4">Are you sure you want to delete this data?</p>
                 <div class="flex justify-end">
                     <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-md mr-2" onclick="closeModal('delete-gear-{{$item->id}}')">Cancel</button>
                     <form action="{{route('gear.destroy',$item->id)}}" method="POST">
                         @csrf
                         @method('DELETE')
                         <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">Delete</button>
                     </form>
                 </div>
             </div>
         </div>
         @endforeach

         <!-- Modal Gambar -->
        <div id="image-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-75" onclick="closeImageModal(event)">
            <div class="relative max-w-md w-full bg-white p-4 rounded-lg" onclick="event.stopPropagation()">
                <span class="absolute top-2 right-2 text-black text-2xl cursor-pointer" onclick="closeImageModal(event)">&times;</span>
                <img id="modal-image" class="rounded-md max-w-full h-auto mx-auto" src="" alt="Enlarged Image">
            </div>
        </div>
        </div>
    @include('assets.js')
</body>
</html>
