<script>
    document.addEventListener('DOMContentLoaded', function() {
        const csrfToken = '{{ csrf_token() }}';
        const categoryIdInput = document.getElementById('category_id');
        const projectsContainer = document.getElementById('projects_container');

        categoryIdInput.addEventListener('change', function() {
            const categoryIdValue = categoryIdInput.value;
            const url = new URL('{{ route('admin.photo.pe') }}');
            url.searchParams.append('photoId', {{ $photo->id }});
            url.searchParams.append('categoryId', categoryIdValue);

            fetch(url, {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json'
                }
            })
                .then(response => response.text())
                .then(data => {
                    projectsContainer.innerHTML = data;
                })
                .catch(error => console.error('Error:', error));
        });

        // Trigger the change event
        const event = new Event('change');
        categoryIdInput.dispatchEvent(event);
    });
</script>
