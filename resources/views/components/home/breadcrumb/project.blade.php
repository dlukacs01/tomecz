<nav aria-label="breadcrumb">
    <ol class="breadcrumb">

        {{-- PROJECTS --}}
        <li class="breadcrumb-item">
            <a href="{{ route('photo.projects') }}" class="text-secondary text-decoration-none">{{ __('Munkák') }}</a>
        </li>

        {{-- CATEGORY --}}
        <li class="breadcrumb-item active" aria-current="page">{{ $project->category->name }}</li>

        {{-- PROJECT --}}
        <li class="breadcrumb-item active" aria-current="page">{{ $project->title }}</li>

    </ol>
</nav>
