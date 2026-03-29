<script>
    document.addEventListener('DOMContentLoaded', function () {

        // INPUTS
        const fileInputs = document.querySelectorAll('input[type="file"]');

        // EXTENSIONS
        const allowedExtensions = {!! json_encode(config('custom.validations.extensions', [
            'jpg', 'jpeg', 'png', 'bmp', 'gif', 'webp'
        ])) !!};

        // MIN
        const minFileSizeKb = {{ config('custom.validations.filesize.calculation.min', 1) }};
        const minFileSize = minFileSizeKb * 1024; // 1 KB in bytes

        // MAX
        const maxFileSizeKb = {{ config('custom.validations.filesize.calculation.max', 30720) }};
        const maxFileSizeMb = {{ config('custom.validations.filesize.display.max', 30) }};
        const maxFileSize = maxFileSizeKb * 1024; // 30 MB in bytes

        fileInputs.forEach(fileInput => {
            fileInput.addEventListener('change', function () {
                const file = fileInput.files[0];

                if (file) {

                    // EXTENSIONS
                    const fileExtension = file.name.split('.').pop().toLowerCase();
                    if (!allowedExtensions.includes(fileExtension)) {
                        alert('Érvénytelen fájl formátum. Megengedett formátumok: ' + allowedExtensions.join(', ') + '.');
                        fileInput.value = ''; // Clear the file input
                        return;
                    }

                    // MIN
                    if (file.size < minFileSize) {
                        alert('A fájl mérete nem lehet kisebb, mint ' + minFileSizeKb + ' KB.');
                        fileInput.value = ''; // Clear the file input
                        return;
                    }

                    // MAX
                    if (file.size > maxFileSize) {
                        alert('A fájl mérete nem lehet nagyobb, mint ' + maxFileSizeMb + ' MB.');
                        fileInput.value = ''; // Clear the file input
                    }
                }
            });
        });
    });
</script>
