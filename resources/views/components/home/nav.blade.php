<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
    <div class="container">

        {{-- LOGO --}}
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ __('Tomecz Dániel') }}
            @env('local')<span class="text-danger">LOCAL</span>@endenv
        </a>

        {{-- HAMBURGER --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- ITEMS --}}
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('photo.projects') }}">{{ __('Munkák') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#!">{{ __('Rólam') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#!">{{ __('Kiállítások') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#!">{{ __('Hírek') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#!">{{ __('Kapcsolat') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Blog</a>
                </li>
            </ul>
        </div>

    </div>
</nav>
