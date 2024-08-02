<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('assets.style')
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>PROFILE | PT. SUMBER INDAHPERKASA</title>
</head>
<body">
    @include('layout.side')
    <div class="p-2 sm:ml-64">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand font-bold" style="font-family: 'Poppins';" href="#">
                    PROFILE
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
                <form action="{{ route('profile.index') }}" method="GET">
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
            <div class="flex items-center space-x-3 md:justify-between md:space-x-40 lg:space-x-96">
                <label class="flex items-center space-x-1.5 mb-4 -ml-7 md:mb-0">
                    <span>Show</span>
                    <form action="{{route('profile.index')}}" method="GET">
                        <select name="pageLength" onchange="this.form.submit()" class="w-16 form-control input-sm border border-gray-300 rounded-lg py-1 px-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="10" {{ $pageLength == 10 ? 'selected' : '' }}>10</option>
                            <option value="25" {{ $pageLength == 25 ? 'selected' : '' }}>25</option>
                            <option value="50" {{ $pageLength == 50 ? 'selected' : '' }}>50</option>
                            <option value="100" {{ $pageLength == 100 ? 'selected' : '' }}>100</option>
                        </select>
                    </form>
                    <span>entries</span>
                </label>
                <button type="button" class="focus:outline-none text-white bg-blue-600 font-medium rounded-lg text-sm px-4 py-2 mb-4" onclick="openModal('add-profile')">Add Data</button>
            </div>
        </div>
        <!-- End Page Lenght and Button Add Item -->

        <!-- Table -->
        <div class="flex justify-center overflow-x-auto sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 lg:w-2/3 md:justify-center lg:justify-center ml-48 md:ml-0 lg:ml-0">
                <thead class="text-sm text-black uppercase bg-white border-1 border-black ">
                <tr>
                    <th scope="col" class="px-6 py-3 border-1 border-black whitespace-nowrap">
                        <div class="flex items-center">
                           USERNAME
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 border-1 border-black whitespace-nowrap">
                        <div class="flex items-center">
                           IMAGE
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 border-1 border-black whitespace-nowrap">
                        <div class="flex items-center">
                            NAME
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 border-1 border-black whitespace-nowrap">
                        <div class="flex items-center">
                            POSITION
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
                @foreach ($profile as $item)
                <tr class="bg-white border-1 border-black">
                    <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                        {{$item->username}}
                    </td>
                    <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                        @if($item->img)
                            <img class="w-10 h-10 rounded-sm cursor-pointer" src="{{ asset('assets/img/' . $item->img) }}" alt="Profile Image" onclick="openImageModal('{{ asset('assets/img/' . $item->img) }}')">
                        @else
                            <img class="w-10 h-10 rounded-sm cursor-pointer" src="{{ asset('assets/img/default.png') }}" alt="Default Image" onclick="openImageModal('{{ asset('assets/img/default.png') }}')">
                        @endif
                    </td>
                    <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                        {{$item->name}}
                    </td>
                    <td class="px-6 py-4 font-medium whitespace-nowrap border-1 border-black text-black">
                        {{$item->jabatan}}
                    </td>
                    <td class="px-2 py-2 text-center">
                        <button type="button" class="focus:outline-none text-black bg-green-600 font-medium rounded-lg text-sm px-8 py-2.5 mb-2" onclick="openModal('edit-profile-{{$item->id}}')">Edit</button>
                        <button type="button" class="focus:outline-none text-black bg-yellow-600 font-medium rounded-lg text-sm px-6 py-2.5" onclick="openModal('change-password-{{ $item->id }}')" >Ubah Password</button>
                        <button type="button" class="focus:outline-none text-black bg-red-600 font-medium rounded-lg text-sm px-6 py-2.5" onclick="openModal('delete-profile-{{$item->id}}')">Delete</button>
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
        {{ $profile->appends(['search' => $search, 'pageLength' => $pageLength])->links('vendor.pagination.tailwind') }}
    </div>

    <!-- End Pagination -->

        <!-- Modal Tambah Data -->
        <div id="add-profile" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white p-4 rounded-lg w-96">
                <h2 class="text-xl font-bold mb-4">Tambah Data Profile</h2>
                <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data" id="add-form">
                    @csrf
                    <div class="mb-2">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama Pengguna</label>
                        <input type="text" id="name" name="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-2">
                        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                        <input type="text" id="username" name="username" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-2">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-2">
                        <label for="jabatan" class="block text-sm font-medium text-gray-700">Jabatan</label>
                        <input type="text" id="jabatan" name="jabatan" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    <div class="mb-2 ">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="password" name="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>

                    <div class="mb-2">
                        <label for="img" class="block text-sm font-medium text-gray-700">Foto Profile</label>
                        <input type="file" id="img" name="img" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    <div class="flex justify-end">
                        <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-md mr-2" onclick="closeModal('add-profile')">Batal</button>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        @foreach ($profile as $item)
          <!-- Edit Modal -->
<div id="edit-profile-{{ $item->id }}" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white p-4 rounded-lg w-96">
        <h2 class="text-xl font-bold mb-4">Edit Profile</h2>
        <form action="{{ route('profile.update', $item->id) }}" method="POST" enctype="multipart/form-data" onsubmit="return validateCurrentPassword()">
            @csrf
            @method('PUT')
            <div class="mb-2">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Pengguna</label>
                <input type="text" id="name" name="name" value="{{$item->name}}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <div class="mb-2">
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" id="username" name="username" value="{{$item->username}}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <div class="mb-2">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="text" id="email" name="email" value="{{$item->email}}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <div class="mb-2">
                <label for="jabatan" class="block text-sm font-medium text-gray-700">Jabatan</label>
                <input type="text" id="jabatan" name="jabatan" value="{{$item->jabatan}}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <div class="mb-2">
                <label for="current_password" class="block text-sm font-medium text-gray-700">Password Saat Ini</label>
                <div class="relative">
                    <input type="password" id="current_password" name="current_password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                </div>
            </div>
            <div class="mb-2">
                <label for="img" class="block text-sm font-medium text-gray-700">Foto Profile</label>
                <input type="file" id="img" name="img" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <div class="flex justify-end">
                <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-md mr-2" onclick="closeModal('edit-profile-{{$item->id}}')">Batal</button>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function validateCurrentPassword() {
        var currentPassword = document.getElementById("current_password").value;
        if (!currentPassword) {
            alert("Password saat ini harus diisi.");
            return false;
        }
        return true;
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
    }
</script>


            <!-- Change Password Modal -->
            <div id="change-password-{{ $item->id }}" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                <div class="bg-white p-4 rounded-lg w-96">
                    <h2 class="text-xl font-bold mb-4">Ubah Password</h2>
                    <form action="{{ route('profile.updatePassword', $item->id) }}" method="POST" onsubmit="return validatePasswordChange()">
                        @csrf
                        @method('PUT')
                        <div class="mb-2">
                            <label for="current_password" class="block text-sm font-medium text-gray-700">Password Saat Ini</label>
                            <div class="relative">
                                <input type="password" id="current_password" name="current_password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="new_password" class="block text-sm font-medium text-gray-700">Password Baru</label>
                            <div class="relative">
                                <input type="password" id="new_password" name="new_password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="confirm_new_password" class="block text-sm font-medium text-gray-700">Konfirmasi Password Baru</label>
                            <div class="relative">
                                <input type="password" id="confirm_new_password" name="confirm_new_password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-md mr-2" onclick="closeModal('change-password-{{ $item->id }}')">Batal</button>
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
            <script>
                function validatePasswordChange() {
                    var newPassword = document.getElementById("new_password").value;
                    var confirmNewPassword = document.getElementById("confirm_new_password").value;
                    if (newPassword !== confirmNewPassword) {
                        alert("Password baru dan konfirmasi password tidak sesuai.");
                        return false;
                    }
                    return true;
                }

                function openModal(modalId) {
                    document.getElementById(modalId).classList.remove('hidden');
                }

                function closeModal(modalId) {
                    document.getElementById(modalId).classList.add('hidden');
                }
            </script>





        <!-- Delete Modal -->
        <div id="delete-profile-{{ $item->id }}" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white p-4 rounded-lg w-96">
                <h2 class="text-xl font-bold mb-4">Delete Profile</h2>
                <form action="{{ route('profile.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="mb-2">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="password" name="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-md mr-2" onclick="closeModal('delete-profile-{{ $item->id }}')">Batal</button>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">Delete</button>
                    </div>
                </form>
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





@include('assets.js')
</body>
</html>
