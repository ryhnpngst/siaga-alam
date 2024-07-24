<div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert"
    id="successAlert">
    <span class="font-medium">{{ $slot }}!</span>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Ambil elemen alert
        const alert = document.getElementById('successAlert');

        if (alert) {
            // Set waktu untuk menghilangkan alert setelah 5 detik (5000 milidetik)
            setTimeout(function() {
                alert.style.opacity = 0;
                setTimeout(function() {
                    alert.remove();
                }, 100); // Waktu delay untuk memastikan animasi hilang sebelum elemen dihapus
            }, 1000); // 5000 ms = 5 detik
        }
    });
</script>
