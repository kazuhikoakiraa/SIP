<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Link Favicon -->
     <link rel="icon" href="../assets/img/logo-landing.png" type="image/png">
    @include('assets.style')
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>USER MOTOR | PT. SUMBER INDAHPERKASA</title>
</head>

<body style="background-color: #F9FAFB; color: #2C3E50; font-family: 'Poppins', sans-serif;">
    @include('layout.user-nav')

    <div class="p-4">
        <nav class="navbar navbar-light bg-white rounded-lg shadow-md p-4 mb-6 flex justify-between items-center w-full mx-auto">
            <h1 class="font-bold text-black text-3xl" style="font-family: 'Poppins'; text-align: center;">MOTOR</h1>
        </nav>

        <div class="mt-6 md:flex md:items-center md:justify-between w-full mx-auto">
            <!-- Page Length and Button Add Item -->
            <div class="flex justify-center md:-mb-3">
                <div class="flex items-center space-x-3 md:justify-between md:space-x-40 lg:space-x-96">
                    <label class="flex items-center space-x-1.5 mb-4 md:mb-0">
                        <span class="text-gray-600 font-medium">Show</span>
                        <form action="{{route('user-motor.index')}}" method="GET">
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
                    <form action="{{ route('user-motor.index') }}" method="GET">
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
        <div class="justify-center overflow-x-auto rounded-lg mt-6 w-full">
            <table class="min-w-full text-sm text-left text-gray-500 border-collapse rounded-lg shadow-md">
                <thead class="text-sm text-black uppercase bg-gradient-to-r from-[#FFC857] to-[#FFD369] border-b border-gray-300 rounded-t-lg">
                    <tr>
                        <th scope="col" class="px-6 py-4 border-b border-gray-300">SAP ID</th>
                        <th scope="col" class="px-6 py-4 border-b border-gray-300">IMAGE</th>
                        <th scope="col" class="px-6 py-4 border-b border-gray-300">EQUIPMENT NAME</th>
                        <th scope="col" class="px-6 py-4 border-b border-gray-300">TAG ID</th>
                        <th scope="col" class="px-6 py-4 border-b border-gray-300">LOCATION</th>
                        <th scope="col" class="px-6 py-4 text-center border-b border-gray-300">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($motor as $item)
                    <tr class="bg-white hover:bg-[#FFF4E0] transition duration-300 border-b border-gray-300">
                        <td class="px-6 py-4 font-medium text-black border-gray-300">{{$item->sap_id}}</td>
                        <td class="px-6 py-4 font-medium text-black border-gray-300">
                            @if($item->img)
                            <img class="table-image h-10 w-10 rounded-sm shadow-md" src="{{ asset('assets/img/' . $item->img) }}" alt="Motor Image">
                            @else
                            <img class="table-image h-10 w-10 rounded-sm shadow-md" src="{{ asset('assets/img/default.png') }}" alt="Default Image">
                            @endif
                        </td>
                        <td class="px-6 py-4 font-medium text-black border-gray-300">{{$item->name}}</td>
                        <td class="px-6 py-4 font-medium text-black border-gray-300">{{$item->tag_id}}</td>
                        <td class="px-6 py-4 font-medium text-black border-gray-300">{{$item->location->name}}</td>
                        <td class="px-2 py-2 text-center">
                            <button type="button" class="flex flex-row items-center focus:outline-none text-white bg-black font-medium rounded-3xl text-sm px-8 py-2" onclick="openModal('{{$item->name}}', '{{$item->img}}', '{{$item->sap_id}}', '{{$item->tag_id}}', '{{$item->location->name}}', '{{$item->brand}}', '{{$item->model}}', '{{$item->ampere}}', '{{$item->power}}', '{{$item->front_bearing}}', '{{$item->rear_bearing}}', '{{$item->speed}}', '{{$item->note}}')">Detail <i class="text-white ml-2" data-feather="alert-circle"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- End Table -->

        <!-- Pagination -->
        <div class="flex justify-center mt-6 w-3/5 mx-auto">
            {{ $motor->appends(['search' => $search, 'pageLength' => $pageLength])->links('vendor.pagination.tailwind') }}
        </div>
        <!-- End Pagination -->

        <!-- Detail Modal -->
        <div id="detail-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white p-6 rounded-lg w-full sm:w-full md:w-1/2 lg:w-1/3 max-h-full overflow-y-auto shadow-lg">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold" id="modal-equipment-name"></h2>
                    <button type="button" class="text-gray-400 hover:text-gray-600" onclick="closeModal()">
                        <i data-feather="x" class="w-6 h-6"></i>
                    </button>
                </div>
                <img id="modal-image" class="w-full max-h-64 object-contain rounded-md shadow-md mb-4" src="" alt="Equipment Image">
                <div class="space-y-2">
                    <p><strong>SAP ID:</strong> <span id="modal-sap-id"></span></p>
                    <p><strong>TAG ID:</strong> <span id="modal-tag-id"></span></p>
                    <p><strong>Location:</strong> <span id="modal-location"></span></p>
                    <p><strong>Brand:</strong> <span id="modal-brand"></span></p>
                    <p><strong>Model:</strong> <span id="modal-model"></span></p>
                    <p><strong>Current:</strong> <span id="modal-current"></span></p>
                    <p><strong>Power:</strong> <span id="modal-power"></span></p>
                    <p><strong>Front Bearing:</strong> <span id="modal-front-bearing"></span></p>
                    <p><strong>Rear Bearing:</strong> <span id="modal-rear-bearing"></span></p>
                    <p><strong>Speed:</strong> <span id="modal-speed"></span></p>
                    <p><strong>Note:</strong> <span id="modal-note"></span></p>
                </div>
            </div>
        </div>
        <!-- End Detail Modal -->

        @include('assets.js')

        <script>
            feather.replace();

            function openModal(name, img, sapId, tagId, locationName, brand, model, current, power, frontBearing, rearBearing, speed, note) {
                document.getElementById('modal-equipment-name').innerText = name;
                document.getElementById('modal-image').src = img ? `{{ asset('assets/img/') }}/${img}` : `{{ asset('assets/img/default.png') }}`;
                document.getElementById('modal-sap-id').innerText = sapId;
                document.getElementById('modal-tag-id').innerText = tagId;
                document.getElementById('modal-location').innerText = locationName;
                document.getElementById('modal-brand').innerText = brand;
                document.getElementById('modal-model').innerText = model;
                document.getElementById('modal-current').innerText = current;
                document.getElementById('modal-power').innerText = power;
                document.getElementById('modal-front-bearing').innerText = frontBearing;
                document.getElementById('modal-rear-bearing').innerText = rearBearing;
                document.getElementById('modal-speed').innerText = speed;
                document.getElementById('modal-note').innerText = note;

                document.getElementById('detail-modal').style.display = 'flex';
            }

            function closeModal() {
                document.getElementById('detail-modal').style.display = 'none';
            }
        </script>

    </div>
</body>

</html>
