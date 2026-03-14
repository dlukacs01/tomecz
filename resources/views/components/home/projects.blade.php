@foreach($category->projects as $project)

    <div class="c-photo-item">

        <a href="{{ route('photo.project', [
            $project->category->slug,
            $project->slug,
            $project
        ]) }}">

            <div class="c-ar-container">
                <img src="{{ $project->original }}" alt="{{ $project->title }}" class="c-ar-content">
            </div>

        </a>

        <p class="text-center">{{ $project->title }}</p>
    </div>
@endforeach
