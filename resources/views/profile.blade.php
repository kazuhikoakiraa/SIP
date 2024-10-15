<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Link Favicon -->
     <link rel="icon" href="../assets/img/logo-landing.png" type="image/png">
    @include('assets.style')
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>PROFILE | PT. SUMBER INDAHPERKASA</title>
</head>
<body style="background-color: #F9FAFB; color: #2C3E50; font-family: 'Poppins', sans-serif;">
    @include('layout.side')
    <div class="p-4 sm:ml-64">
        <nav class="navbar navbar-light bg-white rounded-lg shadow-md p-4 mb-6 flex justify-between items-center">
            <a class="navbar-brand font-bold text-black text-3xl" style="font-family: 'Poppins';" href="#">
                PROFILE
            </a>
            <div class="flex items-center">
                <img src="../assets/img/logo-landing.png" alt="Company Logo" class="h-10 w-10 mr-3">
                <a href="#" class="font-bold text-black text-lg">PT. SUMBER INDAHPERKASA</a>
            </div>
        </nav>

        <!-- Search Bar -->
        <div class="flex justify-center items-center mb-4">
            <div class="relative w-96">
                <form action="{{ route('profile.index') }}" method="GET">
                    <input type="text" name="search" value="{{ $search ?? '' }}" class="pl-10 py-3 text-sm text-gray-900 border border-gray-300 rounded-full w-full bg-white focus:ring-blue-500 focus:border-blue-500 shadow-md" placeholder="Search">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i data-feather="search" class="text-gray-400"></i>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Search Bar -->

        @if (session('success'))
            <div class="alert alert-success bg-green-100 text-green-700 border border-green-400 p-4 rounded-md text-center mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Page Length and Button Add Item -->
        <div class="flex justify-between items-center mb-6">
            <div class="flex items-center space-x-4">
                <label class="flex items-center space-x-2">
                    <span class="text-gray-600 font-medium">Show</span>
                    <form action="{{route('profile.index')}}" method="GET">
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
            <button type="button" class="focus:outline-none text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-full text-sm px-6 py-3 transition duration-300 shadow-md" onclick="openModal('add-profile')">Add Data</button>
        </div>
        <!-- End Page Length and Button Add Item -->

        <!-- Table -->
        <div class="flex justify-start overflow-x-auto sm:rounded-lg">
            <table class="min-w-full text-sm text-left text-gray-500 border-collapse rounded-lg shadow-md">
                <thead class="text-sm text-black uppercase bg-gradient-to-r from-[#FFC857] to-[#FFD369] border-b border-gray-300 rounded-t-lg">
                    <tr>
                        <th scope="col" class="px-6 py-4 text-center border-b border-gray-300">USERNAME</th>
                        <th scope="col" class="px-6 py-4 text-center border-b border-gray-300">IMAGE</th>
                        <th scope="col" class="px-6 py-4 text-center border-b border-gray-300">NAME</th>
                        <th scope="col" class="px-6 py-4 text-center border-b border-gray-300">POSITION</th>
                        <th scope="col" class="px-6 py-4 text-center border-b border-gray-300">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profile as $item)
                    <tr class="bg-white hover:bg-[#FFF4E0] transition duration-300 border-b border-gray-300">
                        <td class="px-6 py-4 font-medium text-black text-center border-gray-300">{{$item->username}}</td>
                        <td class="px-6 py-4 font-medium text-black border-gray-300 flex justify-center items-center">
                            @if($item->img)
                                <img class="w-10 h-10 rounded-sm cursor-pointer shadow-md" src="{{ asset('assets/img/' . $item->img) }}" alt="Profile Image" onclick="openImageModal('{{ asset('assets/img/' . $item->img) }}')">
                            @else
                                <img class="w-10 h-10 rounded-sm cursor-pointer shadow-md" src="{{ asset('assets/img/default.png') }}" alt="Default Image" onclick="openImageModal('{{ asset('assets/img/default.png') }}')">
                            @endif
                        </td>

                        <td class="px-6 py-4 font-medium text-black text-center border-gray-300">{{$item->name}}</td>
                        <td class="px-6 py-4 font-medium text-black text-center border-gray-300">{{$item->jabatan}}</td>
                        <td class="px-2 py-4 text-center">
                            <button type="button" class="focus:outline-none text-white bg-green-600 hover:bg-green-700 font-medium rounded-full text-sm px-6 py-3 transition duration-300 shadow-md" onclick="openModal('edit-profile-{{$item->id}}')">Edit</button>
                            <button type="button" class="focus:outline-none text-white bg-red-600 hover:bg-red-700 font-medium rounded-full text-sm px-6 py-3 transition duration-300 shadow-md" onclick="openModal('delete-profile-{{$item->id}}')">Delete</button>
                            <button type="button" class="focus:outline-none text-white bg-yellow-600 hover:bg-yellow-700 font-medium rounded-full text-sm px-6 py-3 transition duration-300 shadow-md" onclick="openModal('change-password-{{ $item->id }}')">Change Password</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- End Table -->

        <!-- Pagination -->
        <div class="flex justify-center mt-6">
            {{ $profile->appends(['search' => $search, 'pageLength' => $pageLength])->links('vendor.pagination.tailwind') }}
        </div>
        <!-- End Pagination -->

        <!-- Modal Tambah Data -->
        <div id="add-profile" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 overflow-y-auto">
            <div class="bg-white p-6 rounded-lg w-full sm:w-full md:w-1/2 lg:w-1/2 max-h-full overflow-y-auto shadow-lg">
                <h2 class="text-xl font-bold mb-4">Add Profile Data</h2>
                <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data" id="add-form">
                    @csrf
                    <div class="flex flex-col gap-4 mb-2">
                        <div class="flex-1">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" id="name" name="name" class="mt-1 block w-full border-gray-300 rounded-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        </div>
                        <div class="flex-1">
                            <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                            <input type="text" id="username" name="username" class="mt-1 block w-full border-gray-300 rounded-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        </div>
                        <div class="flex-1">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="email" name="email" class="mt-1 block w-full border-gray-300 rounded-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        </div>
                        <div class="flex-1">
                            <label for="jabatan" class="block text-sm font-medium text-gray-700">Position</label>
                            <input type="text" id="jabatan" name="jabatan" class="mt-1 block w-full border-gray-300 rounded-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="flex-1">
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <input type="password" id="password" name="password" class="mt-1 block w-full border-gray-300 rounded-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        </div>
                        <div class="flex-1">
                            <label for="img" class="block text-sm font-medium text-gray-700">Profile Image</label>
                            <input type="file" id="img" name="img" class="mt-1 block w-full border-gray-300 rounded-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="flex justify-end mt-4">
                        <button type="button" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-full mr-2 transition duration-300" onclick="closeModal('add-profile')">Cancel</button>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-full transition duration-300">Save</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Add Modal -->

       <!-- Edit Modal -->
@foreach ($profile as $item)
<div id="edit-profile-{{$item->id}}" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 overflow-y-auto">
    <div class="bg-white p-6 rounded-lg w-full sm:w-full md:w-1/2 lg:w-1/2 max-h-full overflow-y-auto shadow-lg">
        <h2 class="text-xl font-bold mb-4">Edit Profile</h2>
        <form action="{{ route('profile.update', $item->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex flex-col gap-4 mb-2">
                <div class="flex-1">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name" name="name" value="{{ $item->name }}" class="mt-1 block w-full border-gray-300 rounded-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div class="flex-1">
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" id="username" name="username" value="{{ $item->username }}" class="mt-1 block w-full border-gray-300 rounded-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div class="flex-1">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" value="{{ $item->email }}" class="mt-1 block w-full border-gray-300 rounded-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div class="flex-1">
                    <label for="jabatan" class="block text-sm font-medium text-gray-700">Position</label>
                    <input type="text" id="jabatan" name="jabatan" value="{{ $item->jabatan }}" class="mt-1 block w-full border-gray-300 rounded-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div class="flex-1">
                    <label for="img" class="block text-sm font-medium text-gray-700">Profile Image</label>
                    <input type="file" id="img" name="img" class="mt-1 block w-full border-gray-300 rounded-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div class="flex-1">
                    <label for="current_password" class="block text-sm font-medium text-gray-700">Current Password</label>
                    <input type="password" id="current_password" name="current_password" class="mt-1 block w-full border-gray-300 rounded-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                </div>
            </div>
            <div class="flex justify-end mt-4">
                <button type="button" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-full mr-2 transition duration-300" onclick="closeModal('edit-profile-{{$item->id}}')">Cancel</button>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-full transition duration-300">Save</button>
            </div>
        </form>
    </div>
</div>
@endforeach
<!-- End Edit Modal -->


        <!-- Modal Delete Data -->
        @foreach ($profile as $item)
        <div id="delete-profile-{{$item->id}}" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white p-6 rounded-lg w-1/3 shadow-lg">
                <h2 class="text-xl font-bold mb-4">Delete Profile</h2>
                <form action="{{ route('profile.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="password" name="password" class="mt-1 block w-full border-gray-300 rounded-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-full mr-2 transition duration-300" onclick="closeModal('delete-profile-{{$item->id}}')">Cancel</button>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-full transition duration-300">Delete</button>
                    </div>
                </form>
            </div>
        </div>
        @endforeach
        <!-- End Delete Modal -->

        <!-- Modal Change Password -->
        @foreach ($profile as $item)
        <div id="change-password-{{ $item->id }}" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white p-6 rounded-lg w-full sm:w-full md:w-1/2 lg:w-1/2 max-h-full overflow-y-auto shadow-lg">
                <h2 class="text-xl font-bold mb-4">Change Password</h2>
                <form action="{{ route('profile.updatePassword', $item->id) }}" method="POST" onsubmit="return validatePasswordChange()">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-col gap-4 mb-2">
                        <div class="flex-1">
                            <label for="current_password" class="block text-sm font-medium text-gray-700">Current Password</label>
                            <input type="password" id="current_password" name="current_password" class="mt-1 block w-full border-gray-300 rounded-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        </div>
                        <div class="flex-1">
                            <label for="new_password" class="block text-sm font-medium text-gray-700">New Password</label>
                            <input type="password" id="new_password" name="new_password" class="mt-1 block w-full border-gray-300 rounded-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        </div>
                        <div class="flex-1">
                            <label for="confirm_new_password" class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                            <input type="password" id="confirm_new_password" name="confirm_new_password" class="mt-1 block w-full border-gray-300 rounded-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        </div>
                    </div>
                    <div class="flex justify-end mt-4">
                        <button type="button" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-full mr-2 transition duration-300" onclick="closeModal('change-password-{{ $item->id }}')">Cancel</button>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-full transition duration-300">Save</button>
                    </div>
                </form>
            </div>
        </div>
        @endforeach
        <!-- End Change Password Modal -->

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
            const imgInput = document.getElementById('img');

            imgInput.addEventListener('change', function () {
                const file = this.files[0];
                if (file) {
                    const validExtensions = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/svg+xml'];
                    if (!validExtensions.includes(file.type)) {
                        alert('The selected file must be an image of type: jpeg, png, jpg, gif, svg.');
                        this.value = ''; // Clear the file input
                    } else if (file.size > 2048 * 1024) {
                        alert('The image size must not exceed 2MB.');
                        this.value = ''; // Clear the file input
                    }
                }
            });
        });
    </script>

</body>
</html>
