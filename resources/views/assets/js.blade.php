<script> feather.replace(); </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }

    </script>
    <script>
    function openImageModal(src) {
        document.getElementById('modal-image').src = src;
        document.getElementById('image-modal').classList.remove('hidden');
    }

    function closeImageModal() {
        document.getElementById('image-modal').classList.add('hidden');
    }
</script>
