@foreach($category->projects as $project)
    <div class="c-photo-item">
        <div class="c-ar-container">
            <img src="{{ $project->original }}" alt="{{ $project->title }}" class="c-ar-content">
        </div>

        <p class="text-center">

            <a href="{{ route('photo.project', [
                    $project->category->slug,
                    $project->slug,
                    $project
                ]) }}">{{ $project->title }}</a>

        </p>
    </div>
@endforeach
