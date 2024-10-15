<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Link Favicon -->
     <link rel="icon" href="../assets/img/logo-landing.png" type="image/png">
    @include('assets.style')
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>MOTOR | PT. SUMBER INDAHPERKASA</title>
</head>
<body style="background-color: #F9FAFB; color: #2C3E50; font-family: 'Poppins', sans-serif;">
    @include('layout.side')
    <div class="p-4 sm:ml-64">
        <nav class="navbar navbar-light bg-white rounded-lg shadow-md p-4 mb-6 flex justify-between items-center">
            <a class="navbar-brand font-bold text-black text-3xl" style="font-family: 'Poppins';" href="#">
                EQUIPMENT - MOTOR
            </a>
            <div class="flex items-center">
                <img src="../assets/img/logo-landing.png" alt="Company Logo" class="h-10 w-10 mr-3">
                <a href="#" class="font-bold text-black text-lg">PT. SUMBER INDAHPERKASA</a>
            </div>
        </nav>

        <!-- Search Bar -->
        <div class="flex justify-center items-center mb-4">
            <div class="relative w-96">
                <form action="{{ route('motor.index') }}" method="GET">
                    <input type="text" name="search" value="{{ $search ?? '' }}" class="pl-10 py-3 text-sm text-gray-900 border border-gray-300 rounded-full w-full bg-white focus:ring-blue-500 focus:border-blue-500 shadow-md" placeholder="Search for equipment...">
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

        @if (session('error'))
            <div class="alert alert-danger bg-red-100 text-red-700 border border-red-400 p-4 rounded-md text-center mb-4">
                {{ __('An error occurred while processing your request. Please check your input and try again.') }}
            </div>
        @endif

        <!-- Page Length and Button Add Item -->
        <div class="flex justify-between items-center mb-6">
            <div class="flex items-center space-x-4">
                <label class="flex items-center space-x-2">
                    <span class="text-gray-600 font-medium">Show</span>
                    <form action="{{route('motor.index')}}" method="GET">
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
            <button type="button" class="focus:outline-none text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-full text-sm px-6 py-3 transition duration-300 shadow-md" onclick="openModal('add-motor')">Add Data</button>
        </div>
        <!-- End Page Length and Button Add Item -->

        <!-- Table -->
        <div class="flex justify-start overflow-x-auto sm:rounded-lg">
            <table class="min-w-full text-sm text-left text-gray-500 border-collapse rounded-lg shadow-md">
                <thead class="text-sm text-black uppercase bg-gradient-to-r from-[#FFC857] to-[#FFD369] border-b border-gray-300 rounded-t-lg">
                    <tr>
                        <th scope="col" class="px-6 py-4 border-b border-gray-300">
                            SAP ID
                        </th>
                        <th scope="col" class="px-6 py-4 border-b border-gray-300">
                            IMAGE
                        </th>
                        <th scope="col" class="px-6 py-4 border-b border-gray-300">
                            EQUIPMENT NAME
                        </th>
                        <th scope="col" class="px-6 py-4 border-b border-gray-300">
                            TAG ID
                        </th>
                        <th scope="col" class="px-6 py-4 border-b border-gray-300">
                            LOCATION
                        </th>
                        <th scope="col" class="px-6 py-4 border-b border-gray-300">
                            BRAND
                        </th>
                        <th scope="col" class="px-6 py-4 border-b border-gray-300">
                            MODEL/TYPE
                        </th>
                        <th scope="col" class="px-6 py-4 border-b border-gray-300">
                            CURRENT (A)
                        </th>
                        <th scope="col" class="px-6 py-4 border-b border-gray-300">
                            POWER (kw)
                        </th>
                        <th scope="col" class="px-6 py-4 border-b border-gray-300">
                            FRONT BEARING
                        </th>
                        <th scope="col" class="px-6 py-4 border-b border-gray-300">
                            REAR BEARING
                        </th>
                        <th scope="col" class="px-6 py-4 border-b border-gray-300">
                            SPEED (rpm)
                        </th>
                        <th scope="col" class="px-6 py-4 border-b border-gray-300">
                            NOTE
                        </th>
                        <th scope="col" class="px-6 py-4 text-center border-b border-gray-300">
                            ACTION
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($motor as $item)
                    <tr class="bg-white hover:bg-[#FFF4E0] transition duration-300 border-b border-gray-300">
                        <td class="px-6 py-4 font-medium text-black border-gray-300">
                            {{$item->sap_id}}
                        </td>
                        <td class="px-6 py-4 font-medium text-black border-gray-300">
                            @if($item->img)
                                <img class="w-10 h-10 rounded-sm cursor-pointer shadow-md" src="{{ asset('assets/img/' . $item->img) }}" alt="Motor Image" onclick="openImageModal('{{ asset('assets/img/' . $item->img) }}')">
                            @else
                                <img class="w-10 h-10 rounded-sm cursor-pointer shadow-md" src="{{ asset('assets/img/default.png') }}" alt="Default Image" onclick="openImageModal('{{ asset('assets/img/default.png') }}')">
                            @endif
                        </td>
                        <td class="px-6 py-4 font-medium text-black border-gray-300">
                            {{$item->name}}
                        </td>
                        <td class="px-6 py-4 font-medium text-black border-gray-300">
                            {{$item->tag_id}}
                        </td>
                        <td class="px-6 py-4 font-medium text-black border-gray-300">
                            {{$item->location->name}}
                        </td>
                        <td class="px-6 py-4 font-medium text-black border-gray-300">
                            {{$item->brand}}
                        </td>
                        <td class="px-6 py-4 font-medium text-black border-gray-300">
                            {{$item->model}}
                        </td>
                        <td class="px-6 py-4 font-medium text-black border-gray-300">
                            {{$item->ampere}}
                        </td>
                        <td class="px-6 py-4 font-medium text-black border-gray-300">
                            {{$item->power}}
                        </td>
                        <td class="px-6 py-4 font-medium text-black border-gray-300">
                            {{$item->front_bearing}}
                        </td>
                        <td class="px-6 py-4 font-medium text-black border-gray-300">
                            {{$item->rear_bearing}}
                        </td>
                        <td class="px-6 py-4 font-medium text-black border-gray-300">
                            {{$item->speed}}
                        </td>
                        <td class="px-6 py-4 font-medium text-black border-gray-300">
                            {{$item->note}}
                        </td>
                        <td class="px-6 py-4 text-center">
                            <button type="button" class="focus:outline-none text-white bg-green-600 hover:bg-green-700 font-medium rounded-full text-sm px-6 py-3 transition duration-300 shadow-md w-28" onclick="openModal('edit-motor-{{$item->id}}')">Edit</button>
                            <button type="button" class="focus:outline-none text-white bg-red-600 hover:bg-red-700 font-medium rounded-full text-sm px-6 py-3 transition duration-300 shadow-md w-28" onclick="openModal('delete-motor-{{$item->id}}')">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- End Table -->

        <!-- Pagination -->
        <div class="flex justify-center mt-6">
            {{ $motor->appends(['search' => $search, 'pageLength' => $pageLength])->links('vendor.pagination.tailwind') }}
        </div>
        <!-- End Pagination -->

        <!-- Modal Tambah Data -->
        <div id="add-motor" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 overflow-y-auto">
            <div class="bg-white p-6 rounded-lg w-full sm:w-full md:w-1/2 lg:w-1/2 max-h-full overflow-y-auto shadow-lg">
                <h2 class="text-xl font-bold mb-4">Add Motor Data</h2>
                <form action="{{route('motor.store')}}" method="POST" enctype="multipart/form-data" id="add-form">
                    @csrf
                    <div class="flex flex-col md:flex-row gap-4 mb-2">
                        <div class="flex-1">
                            <label for="sap_id" class="block text-sm font-medium text-gray-700">SAP ID</label>
                            <input type="text" id="sap_id" name="sap_id" class="mt-1 block w-full border-gray-300 rounded-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        </div>
                        <div class="flex-1">
                            <label for="img" class="block text-sm font-medium text-gray-700">Image</label>
                            <input type="file" id="img" name="img" class="mt-1 block w-full border-gray-300 rounded-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-4 mb-2">
                        <div class="flex-1">
                            <label for="name" class="block text-sm font-medium text-gray-700">Equipment Name</label>
                            <input type="text" id="name" name="name" class="mt-1 block w-full border-gray-300 rounded-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        </div>
                        <div class="flex-1">
                            <label for="tag_id" class="block text-sm font-medium text-gray-700">TAG ID</label>
                            <input type="text" id="tag_id" name="tag_id" class="mt-1 block w-full border-gray-300 rounded-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-4 mb-2">
                        <div class="flex-1">
                            <label for="location_id" class="block text-sm font-medium text-gray-700">Location</label>
                            <select id="location_id" name="location_id" class="mt-1 block w-full border-gray-300 rounded-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                <option selected="">Select Location</option>
                                @foreach ($locations as $location)
                                <option value="{{ $location->id}}">{{ $location->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex-1">
                            <label for="brand" class="block text-sm font-medium text-gray-700">Brand</label>
                            <input type="text" id="brand" name="brand" class="mt-1 block w-full border-gray-300 rounded-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-4 mb-2">
                        <div class="flex-1">
                            <label for="model" class="block text-sm font-medium text-gray-700">Model</label>
                            <input type="text" id="model" name="model" class="mt-1 block w-full border-gray-300 rounded-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="flex-1">
                            <label for="ampere" class="block text-sm font-medium text-gray-700">Current (A)</label>
                            <input type="text" id="ampere" name="ampere" class="mt-1 block w-full border-gray-300 rounded-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-4 mb-2">
                        <div class="flex-1">
                            <label for="power" class="block text-sm font-medium text-gray-700">Power</label>
                            <input type="text" id="power" name="power" class="mt-1 block w-full border-gray-300 rounded-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="flex-1">
                            <label for="front_bearing" class="block text-sm font-medium text-gray-700">Front Bearing</label>
                            <input type="text" id="front_bearing" name="front_bearing" class="mt-1 block w-full border-gray-300 rounded-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-4 mb-2">
                        <div class="flex-1">
                            <label for="rear_bearing" class="block text-sm font-medium text-gray-700">Rear Bearing</label>
                            <input type="text" id="rear_bearing" name="rear_bearing" class="mt-1 block w-full border-gray-300 rounded-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="flex-1">
                            <label for="speed" class="block text-sm font-medium text-gray-700">Speed (rpm)</label>
                            <input type="text" id="speed" name="speed" class="mt-1 block w-full border-gray-300 rounded-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="note" class="block text-sm font-medium text-gray-700">Note</label>
                        <textarea rows="4" id="note" name="note" class="mt-1 block w-full border-gray-300 rounded-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
                    </div>
                    <div class="flex justify-end mt-4">
                        <button type="button" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-full mr-2 transition duration-300" onclick="closeModal('add-motor')">Cancel</button>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-full transition duration-300">Save</button>
                    </div>
                </form>
            </div>
        </div>

        @foreach ($motor as $item)
        <!-- Modal Edit Data -->
        <div id="edit-motor-{{$item->id}}" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 overflow-y-auto">
            <div class="bg-white p-6 rounded-lg w-full sm:w-full md:w-1/2 lg:w-1/2 max-h-full overflow-y-auto shadow-lg">
                <h2 class="text-xl font-bold mb-4">Edit Motor Data</h2>
                <form action="{{ route('motor.update', $item->id) }}" method="POST" enctype="multipart/form-data" id="edit-form-{{$item->id}}">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-col md:flex-row gap-4 mb-2">
                        <div class="flex-1">
                            <label for="sap_id" class="block text-sm font-medium text-gray-700">SAP ID</label>
                            <input type="text" id="sap_id" name="sap_id" value="{{ old('sap_id', $item->sap_id) }}" class="mt-1 block w-full border-gray-300 rounded-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="flex-1">
                            <label for="img" class="block text-sm font-medium text-gray-700">Image</label>
                            <input type="file" id="img-edit-{{$item->id}}" name="img" class="mt-1 block w-full border-gray-300 rounded-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-4 mb-2">
                        <div class="flex-1">
                            <label for="name" class="block text-sm font-medium text-gray-700">Equipment Name</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $item->name) }}" class="mt-1 block w-full border-gray-300 rounded-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="flex-1">
                            <label for="tag_id" class="block text-sm font-medium text-gray-700">TAG ID</label>
                            <input type="text" id="tag_id" name="tag_id" value="{{ old('tag_id', $item->tag_id) }}" class="mt-1 block w-full border-gray-300 rounded-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-4 mb-2">
                        <div class="flex-1">
                            <label for="location_id" class="block text-sm font-medium text-gray-700">Location</label>
                            <select id="location_id" name="location_id" class="mt-1 block w-full border-gray-300 rounded-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                <option value="{{ $item->location_id }}" selected>{{ $item->location->name }}</option>
                                @foreach ($locations as $loc)
                                    <option value="{{ $loc->id }}">{{ $loc->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex-1">
                            <label for="brand" class="block text-sm font-medium text-gray-700">Brand</label>
                            <input type="text" id="brand" name="brand" value="{{ old('brand', $item->brand) }}" class="mt-1 block w-full border-gray-300 rounded-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-4 mb-2">
                        <div class="flex-1">
                            <label for="model" class="block text-sm font-medium text-gray-700">Model</label>
                            <input type="text" id="model" name="model" value="{{ old('model', $item->model) }}" class="mt-1 block w-full border-gray-300 rounded-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="flex-1">
                            <label for="ampere" class="block text-sm font-medium text-gray-700">Current (A)</label>
                            <input type="text" id="ampere" name="ampere" value="{{ old('ampere', $item->ampere) }}" class="mt-1 block w-full border-gray-300 rounded-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-4 mb-2">
                        <div class="flex-1">
                            <label for="power" class="block text-sm font-medium text-gray-700">Power</label>
                            <input type="text" id="power" name="power" value="{{ old('power', $item->power) }}" class="mt-1 block w-full border-gray-300 rounded-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="flex-1">
                            <label for="front_bearing" class="block text-sm font-medium text-gray-700">Front Bearing</label>
                            <input type="text" id="front_bearing" name="front_bearing" value="{{ old('front_bearing', $item->front_bearing) }}" class="mt-1 block w-full border-gray-300 rounded-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-4 mb-2">
                        <div class="flex-1">
                            <label for="rear_bearing" class="block text-sm font-medium text-gray-700">Rear Bearing</label>
                            <input type="text" id="rear_bearing" name="rear_bearing" value="{{ old('rear_bearing', $item->rear_bearing) }}" class="mt-1 block w-full border-gray-300 rounded-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="flex-1">
                            <label for="speed" class="block text-sm font-medium text-gray-700">Speed (rpm)</label>
                            <input type="text" id="speed" name="speed" value="{{ old('speed', $item->speed) }}" class="mt-1 block w-full border-gray-300 rounded-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="note" class="block text-sm font-medium text-gray-700">Note</label>
                        <textarea rows="4" id="note" name="note" class="mt-1 block w-full border-gray-300 rounded-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">{{ old('note', $item->note) }}</textarea>
                    </div>
                    <div class="flex justify-end mt-4">
                        <button type="button" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-full mr-2 transition duration-300" onclick="closeModal('edit-motor-{{$item->id}}')">Cancel</button>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-full transition duration-300">Save</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Edit Modal -->

        <!-- Modal Delete Data -->
        <div id="delete-motor-{{$item->id}}" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white p-6 rounded-lg w-1/3 shadow-lg">
                <h2 class="text-xl font-bold mb-4">Delete Motor Data</h2>
                <p class="mb-4">Are you sure you want to delete this data?</p>
                <div class="flex justify-end">
                    <button type="button" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-full mr-2 transition duration-300" onclick="closeModal('delete-motor-{{$item->id}}')">Cancel</button>
                    <form action="{{route('motor.destroy',$item->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-full transition duration-300">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Delete Modal -->
        @endforeach

        <!-- Modal Gambar -->
        <div id="image-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-75" onclick="closeImageModal(event)">
            <div class="relative max-w-md w-full bg-white p-4 rounded-lg shadow-lg" onclick="event.stopPropagation()">
                <span class="absolute top-2 right-2 text-black text-2xl cursor-pointer" onclick="closeImageModal(event)">&times;</span>
                <img id="modal-image" class="rounded-md max-w-full h-auto mx-auto shadow-md" src="" alt="Enlarged Image">
            </div>
        </div>
    </div>
    @include('assets.js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const imgInputs = document.querySelectorAll('[id^="img"]');

            imgInputs.forEach((imgInput) => {
                imgInput.addEventListener('change', function () {
                    validateImage(this);
                });
            });
        });

        function validateImage(input) {
            const file = input.files[0];
            if (file) {
                const validExtensions = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/svg+xml'];
                if (!validExtensions.includes(file.type)) {
                    alert('The selected file must be an image of type: jpeg, png, jpg, gif, svg.');
                    input.value = ''; // Clear the file input
                } else if (file.size > 2048 * 1024) {
                    alert('The image size must not exceed 2MB.');
                    input.value = ''; // Clear the file input
                }
            }
        }
    </script>
</body>
</html>
