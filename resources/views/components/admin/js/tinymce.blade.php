<script>

    // .. After imports init TinyMCE ..
    window.addEventListener('DOMContentLoaded', () => {
        tinymce.init({
            selector: 'textarea:not(.mceNoEditor)',
            license_key: 'gpl',
            plugins: ['wordcount', 'lists', 'table'],
            // toolbar: 'numlist bullist | table tabledelete | tableprops tablerowprops tablecellprops | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol',
            language: 'hu_HU',

            /* TinyMCE configuration options */
            skin: false,
            content_css: false
        });
    });

</script>
