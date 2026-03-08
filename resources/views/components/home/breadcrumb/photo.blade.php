<nav aria-label="breadcrumb">
    <ol class="breadcrumb">

        {{-- PROJECTS --}}
        <li class="breadcrumb-item">
            <a href="{{ route('photo.projects') }}" class="text-secondary text-decoration-none">{{ __('Munkák') }}</a>
        </li>

        {{-- CATEGORY --}}
        <li class="breadcrumb-item active" aria-current="page">{{ $photo->project->category->name }}</li>

        {{-- PROJECT --}}
        <li class="breadcrumb-item">
            <a href="{{ route('photo.project', [
                'category_slug' => $photo->project->category->slug,
                'project_slug' => $photo->project->slug,
                'project' => $photo->project
            ]) }}" class="text-secondary text-decoration-none">{{ $photo->project->title }}</a>
        </li>

    </ol>
</nav>
