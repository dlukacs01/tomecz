<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">

                {{-- MAIN --}}
                <div class="sb-sidenav-menu-heading">Főmenü</div>

                <hr>

                {{-- CATEGORIES --}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCategories" aria-expanded="false" aria-controls="collapseCategories">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Kategóriák
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseCategories" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('admin.categories.create') }}">Kategória létrehozása</a>
                        <a class="nav-link" href="{{ route('admin.categories.index') }}">Kategóriák megtekintése</a>
                    </nav>
                </div>

                {{-- PROJECTS --}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProjects" aria-expanded="false" aria-controls="collapseProjects">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Projektek
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseProjects" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('admin.projects.create') }}">Projekt létrehozása</a>
                        <a class="nav-link" href="{{ route('admin.projects.index') }}">Projektek megtekintése</a>
                    </nav>
                </div>

                {{-- PHOTOS --}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePhotos" aria-expanded="false" aria-controls="collapsePhotos">
                    <div class="sb-nav-link-icon"><i class="fas fa-image"></i></div>
                    Képek
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePhotos" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('admin.photos.create') }}">Kép feltöltése</a>
                        <a class="nav-link" href="{{ route('admin.project.select') }}">Képek megtekintése</a>
                    </nav>
                </div>

                {{-- VIDEOS --}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseVideos" aria-expanded="false" aria-controls="collapseVideos">
                    <div class="sb-nav-link-icon"><i class="fas fa-video"></i></div>
                    Videók
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseVideos" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('admin.videos.create') }}">Videó létrehozása</a>
                        <a class="nav-link" href="{{ route('admin.videos.index') }}">Videók megtekintése</a>
                    </nav>
                </div>

                {{-- OTHER --}}
                <div class="sb-sidenav-menu-heading">Egyéb</div>

                <hr>

                {{-- EXHIBITIONS --}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseExhibitions" aria-expanded="false" aria-controls="collapseExhibitions">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Kiállítások
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseExhibitions" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('admin.exhibitions.create') }}">Kiállítás feltöltése</a>
                        <a class="nav-link" href="{{ route('admin.exhibitions.index') }}">Kiállítások megtekintése</a>
                    </nav>
                </div>

                {{-- STORIES --}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseStories" aria-expanded="false" aria-controls="collapseStories">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Hírek
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseStories" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('admin.stories.create') }}">Hír létrehozása</a>
                        <a class="nav-link" href="{{ route('admin.stories.index') }}">Hírek megtekintése</a>
                    </nav>
                </div>

            </div>
        </div>

        {{-- FOOTER --}}
        <div class="sb-sidenav-footer">
            <div class="small">Belépve, mint:</div>
            {{ auth()->user()->name }}
        </div>

    </nav>
</div>
