<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('assets.style')
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>USER GEAR | PT. SUMBER INDAHPERKASA</title>
</head>

<body>
    @include('layout.user-nav')

    <div class="p-4">
        <h1 class="font-bold text-3xl p-3">EQUIPMENT-GEAR BOX</h1>
         <!-- Search Bar -->
         <div class="flex justify-center items-center mb-4 -ml-3">
            <div class="relative w-80">
                <form action="{{ route('user-gear.index') }}" method="GET">
                    <input type="text" name="search" value="{{ $search ?? '' }}" class="pl-10 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg w-full bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i data-feather="search"></i>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Search Bar -->

        <!-- Table -->
        <div class="flex flex-col items-center justify-center relative overflow-x-auto sm:rounded-lg">
            <!-- Page Length and Button Add Item -->
            <div class="flex w-full px-4 py-2 mb-4">
                <label class="flex items-center space-x-1.5">
                    <span>Show</span>
                    <form action="{{route('user-gear.index')}}" method="GET">
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
            <!-- End Page Length and Button Add Item -->

            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 lg:w-2/3 mx-auto">
                <thead class="text-sm text-black uppercase bg-white border-1 border-black lg:justify-start ">
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
                    <th scope="col" class="px-6 py-3 text-center">
                        <div>
                            AKSI
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
                                <img class="w-10 h-10 rounded-sm" src="{{ asset('assets/img/' . $item->img) }}" alt="Gear Image">
                            @else
                                <img class="w-10 h-10 rounded-sm" src="{{ asset('assets/img/default.png') }}" alt="Default Image">
                            @endif
                        </td>
                        <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                            {{$item->name}}
                        </td>
                        <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                            {{$item->tag_id}}
                        </td>
                        <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                            {{$item->location->name}}
                        </td>
                        <td class="px-2 py-2 text-center">
                            <button type="button" class="flex flex-row items-center focus:outline-none text-white bg-black font-medium rounded-3xl text-sm px-8 py-2" onclick="detailModal(
                                '{{ $item->name }}',
                                '{{ $item->img }}',
                                '{{ $item->sap_id }}',
                                '{{ $item->tag_id }}',
                                '{{ $item->location->name }}',
                                '{{ $item->brand }}',
                                '{{ $item->model }}',
                                '{{ $item->capacity }}',
                                '{{ $item->head }}',
                                '{{ $item->coupling }}',
                                '{{ $item->front_bearing }}',
                                '{{ $item->rear_bearing }}',
                                '{{ $item->impeler }}',
                                '{{ $item->oil }}',
                                '{{ $item->oil_seal }}',
                                '{{ $item->grease }}',
                                '{{ $item->mech_seal }}',
                                '{{ $item->note }}'
                            )">
                                Detail <i class="text-white ml-2" data-feather="alert-circle"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
        <!-- End Table -->


        <!-- Pagination -->
        <div class="flex justify-center mt-4">
            {{ $gearbox->appends(['search' => $search, 'pageLength' => $pageLength])->links('vendor.pagination.tailwind') }}
        </div>

         <!-- End Pagination -->

         <!-- Modal -->
        <div id="detail-modal" class="hidden fixed z-50 inset-0 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen px-4 text-center">
                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
                <div class="inline-block align-middle bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all max-w-lg w-full p-6">
                    <h2 id="modal-equipment-name" class="text-2xl font-bold text-center mb-4"></h2>
                    <img id="modal-image" src="" alt="Equipment Image" class="w-full h-64 object-cover mb-4">
                    <p id="modal-sap-id" class="text-center mb-2"></p>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p><strong>Tag ID:</strong> <span id="modal-tag-id"></span></p>
                            <p><strong>Location:</strong> <span id="modal-location"></span></p>
                            <p><strong>Brand:</strong> <span id="modal-brand"></span></p>
                            <p><strong>Model/Type:</strong> <span id="modal-model"></span></p>
                            <p><strong>Capacity:</strong> <span id="modal-capacity"></span></p>
                        </div>
                        <div>
                            <p><strong>Head:</strong> <span id="modal-head"></span></p>
                            <p><strong>Coupling:</strong> <span id="modal-coupling"></span></p>
                            <p><strong>Front Bearing:</strong> <span id="modal-front-bearing"></span></p>
                            <p><strong>Rear Bearing:</strong> <span id="modal-rear-bearing"></span></p>
                            <p><strong>Impeler:</strong> <span id="modal-impeler"></span></p>
                            <p><strong>Oil:</strong> <span id="modal-oil"></span></p>
                            <p><strong>Oil Seal:</strong> <span id="modal-oil-seal"></span></p>
                            <p><strong>Grease:</strong> <span id="modal-grease"></span></p>
                            <p><strong>Mech Seal:</strong> <span id="modal-mech-seal"></span></p>
                            <p><strong>Note:</strong> <span id="modal-note"></span></p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="button" class="w-full bg-black text-white font-medium py-2 rounded-lg" onclick="closeModal()">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->


    @include('assets.js')

    <script>
        function detailModal(name, img, sapId, tagId, locationName, brand, model, capacity, head, coupling, frontBearing, rearBearing, impeler, oil, oilSeal, grease, mechSeal, note) {
            document.getElementById('modal-equipment-name').innerText = name;
            document.getElementById('modal-image').src = img ? `{{ asset('assets/img/') }}/${img}` : `{{ asset('assets/img/default.png') }}`;
            document.getElementById('modal-sap-id').innerText = `SAP ID: ${sapId}`;
            document.getElementById('modal-tag-id').innerText = tagId;
            document.getElementById('modal-location').innerText = locationName;
            document.getElementById('modal-brand').innerText = brand;
            document.getElementById('modal-model').innerText = model;
            document.getElementById('modal-capacity').innerText = capacity;
            document.getElementById('modal-head').innerText = head;
            document.getElementById('modal-coupling').innerText = coupling;
            document.getElementById('modal-front-bearing').innerText = frontBearing;
            document.getElementById('modal-rear-bearing').innerText = rearBearing;
            document.getElementById('modal-impeler').innerText = impeler;
            document.getElementById('modal-oil').innerText = oil;
            document.getElementById('modal-oil-seal').innerText = oilSeal;
            document.getElementById('modal-grease').innerText = grease;
            document.getElementById('modal-mech-seal').innerText = mechSeal;
            document.getElementById('modal-note').innerText = note;

            document.getElementById('detail-modal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('detail-modal').classList.add('hidden');
        }
    </script>


</body>

</html>
