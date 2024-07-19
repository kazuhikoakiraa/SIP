<script> feather.replace(); </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }

        function deleteData() {
            // Logika untuk menghapus data di sini
            closeModal('delete-modal');
        }

        document.getElementById('add-form').addEventListener('submit', function(e) {
            e.preventDefault();
            // Logika untuk menyimpan data baru di sini
            closeModal('add-modal');
        });

        document.getElementById('edit-form').addEventListener('submit', function(e) {
            e.preventDefault();
            // Logika untuk menyimpan data yang diedit di sini
            closeModal('edit-modal');
        });
    </script>