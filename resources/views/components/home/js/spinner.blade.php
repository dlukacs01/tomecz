<script>

    function showPage() {
        document.getElementById("spinner").style.display = "none";
        document.getElementById("spinner-content").style.display = "block";
    }

    {{-- LOCAL --}}
    @env('local')
        setTimeout(showPage, {{ config('custom.spinner', 1000) }});
    @endenv

    {{-- PROD --}}
    @production
        window.onload = function() {
            showPage();
        };
    @endproduction

</script>
