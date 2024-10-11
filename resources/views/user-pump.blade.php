<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER PUMP | PT. SUMBER INDAHPERKASA</title>
    <!-- Internal CSS -->
    <style>
        /* General Styling */
        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
            margin-top: 30px;
        }

        /* Search Bar and Dropdown Styling */
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

        .search-container input, .dropdown-container select {
            padding: 12px 20px;
            border: 1px solid #ccc;
            border-radius: 25px;
            outline: none;
            transition: border-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .search-container input:focus, .dropdown-container select:focus {
            border-color: #3B4A6B;
            box-shadow: 0 6px 12px rgba(59, 74, 107, 0.2);
        }

        /* Table Styling */
        .table-container {
            overflow-x: auto;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
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

        tr:hover td {
            background-color: #EEF2F7;
            color: #3B4A6B;
            transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
        }

        .table-image {
            width: 60px;
            height: 60px;
            border-radius: 8px;
            object-fit: cover;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
        }

        .pagination a:hover, .pagination span:hover, .pagination .active {
            background-color: #3B4A6B;
            color: #fff;
        }

        /* Button Styling */
        .btn-detail {
            padding: 10px 20px;
            background: #3B4A6B;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .btn-detail:hover {
            background-color: #2A3D59;
        }

        /* Modal Styling */
        .modal-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 999;
        }

        .modal-container {
            background: white;
            border-radius: 10px;
            width: 60%;
            padding: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            gap: 20px;
            max-height: 80%;
            overflow-y: auto;
        }

        .modal-header {
            text-align: center;
        }

        .modal-header h2 {
            margin: 0;
            font-size: 24px;
            color: #3B4A6B;
        }

        .modal-body {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .modal-body img {
            width: 100%;
            height: 300px;
            border-radius: 8px;
            object-fit: cover;
            margin-bottom: 20px;
        }

        .modal-info {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .modal-info div {
            flex: 1 1 45%;
            background: #f8f9fc;
            padding: 10px 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .modal-footer {
            display: flex;
            justify-content: center;
        }

        .modal-footer button {
            padding: 10px 20px;
            background: #3B4A6B;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .modal-footer button:hover {
            background-color: #2A3D59;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .modal-container {
                width: 80%;
            }

            .modal-body img {
                height: 200px;
            }

            .modal-info div {
                flex: 1 1 100%;
            }
        }

        @media (max-width: 480px) {
            .modal-container {
                width: 90%;
                padding: 15px;
            }

            .modal-body img {
                height: 150px;
            }
        }
    </style>
</head>

<body>
    @include('layout.user-nav')

    <div class="container">
        <h1 class="title">PUMP</h1>

        <!-- Search Bar and Page Length -->
        <div class="search-container">
            <div class="dropdown-container">
                <form action="{{route('user-pump.index')}}" method="GET">
                    <label>
                        <span>Show</span>
                        <select name="pageLength" id="pageLength" onchange="this.form.submit()">
                            <option value="10" {{ $pageLength == 10 ? 'selected' : '' }}>10</option>
                            <option value="25" {{ $pageLength == 25 ? 'selected' : '' }}>25</option>
                            <option value="50" {{ $pageLength == 50 ? 'selected' : '' }}>50</option>
                            <option value="100" {{ $pageLength == 100 ? 'selected' : '' }}>100</option>
                        </select>
                        <span>entries</span>
                    </label>
                </form>
            </div>

<<<<<<< HEAD
            <form action="{{ route('user-pump.index') }}" method="GET">
                <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search">
                <i data-feather="search"></i>
            </form>
        </div>

        <!-- Table Data -->
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>SAP ID</th>
                        <th>IMAGE</th>
                        <th>EQUIPMENT NAME</th>
                        <th>TAG ID</th>
                        <th>LOCATION</th>
                        <th class="text-center">AKSI</th>
=======
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
>>>>>>> parent of e201aee (push css edit)
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pump as $item)
<<<<<<< HEAD
                    <tr>
                        <td>{{$item->sap_id}}</td>
                        <td>
=======
                    <tr class="bg-white border-1 border-black">
                        <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                            {{$item->sap_id}}
                        </td>
                        <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
>>>>>>> parent of e201aee (push css edit)
                            @if($item->img)
                            <img class="table-image" style="width: 60px; height: 60px; border-radius: 8px; object-fit: cover; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);" 
                            src="{{ asset('assets/img/' . $item->img) }}" alt="Pump Image">
                            @else
                            <img class="table-image" src="{{ asset('assets/img/default.png') }}" alt="Default Image">
                            @endif
                        </td>
<<<<<<< HEAD
                        <td>{{$item->name}}</td>
                        <td>{{$item->tag_id}}</td>
                        <td>{{$item->location->name}}</td>
                        <td class="text-center">
                            <button type="button" class="btn-detail" onclick="detailModal('{{$item->name}}', '{{$item->img}}', '{{$item->sap_id}}', '{{$item->tag_id}}', '{{$item->location->name}}', '{{$item->brand}}', '{{$item->model}}', '{{$item->capacity}}', '{{$item->head}}', '{{$item->coupling}}', '{{$item->front_bearing}}', '{{$item->rear_bearing}}', '{{$item->impeler}}', '{{$item->oil}}', '{{$item->oil_seal}}', '{{$item->grease}}', '{{$item->mech_seal}}', '{{$item->note}}')">Detail</button>
=======
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
>>>>>>> parent of e201aee (push css edit)
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            {{ $pump->appends(['search' => $search, 'pageLength' => $pageLength])->links('vendor.pagination.tailwind') }}
        </div>
    </div>

    <!-- Modal -->
    <div id="detail-modal" class="modal-bg">
        <div class="modal-container">
            <div class="modal-header">
                <h2 id="modal-equipment-name">Equipment Name</h2>
            </div>
            <div class="modal-body">
                <img id="modal-image" src="" alt="Equipment Image">
                <div class="modal-info">
                    <div><strong>SAP ID:</strong> <span id="modal-sap-id"></span></div>
                    <div><strong>Tag ID:</strong> <span id="modal-tag-id"></span></div>
                    <div><strong>Location:</strong> <span id="modal-location"></span></div>
                    <div><strong>Brand:</strong> <span id="modal-brand"></span></div>
                    <div><strong>Model/Type:</strong> <span id="modal-model"></span></div>
                    <div><strong>Capacity:</strong> <span id="modal-capacity"></span></div>
                    <div><strong>Head:</strong> <span id="modal-head"></span></div>
                    <div><strong>Coupling:</strong> <span id="modal-coupling"></span></div>
                    <div><strong>Front Bearing:</strong> <span id="modal-front-bearing"></span></div>
                    <div><strong>Rear Bearing:</strong> <span id="modal-rear-bearing"></span></div>
                    <div><strong>Impeler:</strong> <span id="modal-impeler"></span></div>
                    <div><strong>Oil:</strong> <span id="modal-oil"></span></div>
                    <div><strong>Oil Seal:</strong> <span id="modal-oil-seal"></span></div>
                    <div><strong>Grease:</strong> <span id="modal-grease"></span></div>
                    <div><strong>Mech Seal:</strong> <span id="modal-mech-seal"></span></div>
                    <div><strong>Note:</strong> <span id="modal-note"></span></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="closeModal()">Tutup</button>
            </div>
        </div>
    </div>

    <!-- Script Modal -->
    <script>
        feather.replace();

        function detailModal(name, img, sapId, tagId, locationName, brand, model, capacity, head, coupling, frontBearing, rearBearing, impeler, oil, oilSeal, grease, mechSeal, note) {
            document.getElementById('modal-equipment-name').innerText = name;
            document.getElementById('modal-image').src = img ? `{{ asset('assets/img/') }}/${img}` : `{{ asset('assets/img/default.png') }}`;
            document.getElementById('modal-sap-id').innerText = sapId;
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

            document.getElementById('detail-modal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('detail-modal').style.display = 'none';
        }
    </script>
</body>
</html>
