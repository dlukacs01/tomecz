<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

<!-- jQuery -->
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}

<!-- Icons -->
{{-- <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script> --}}

<!-- Scripts -->
@vite([
    'resources/js/custom/admin/scripts.js', // SB Admin
    'resources/js/custom/admin/tinymce/tinymce.js', // tinymce imports
    'resources/js/custom/admin/tinymce/langs/hu_HU.js'
])

<!-- Page level scripts -->
@yield('scripts')
