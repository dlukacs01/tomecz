@foreach($category->latestPhotos() as $photo)
    <div class="c-photo-item">

        <a href="{{ route('photo.show', [
            $photo->project->category->slug,
            $photo->project->slug,
            $photo->slug,
            $photo
        ]) }}">

            <div class="c-ar-container">
                <img src="{{ $photo->original }}" alt="{{ $photo->title }}" class="c-ar-content">
            </div>

        </a>

        <div class="c-photo-meta">
            <span class="text-start">{{ $photo->title }}</span>
            <span class="text-end">

                <a href="{{ route('photo.project', [
                    $photo->project->category->slug,
                    $photo->project->slug,
                    $photo->project
                ]) }}">{{ $photo->project->title }}</a>

            </span>
        </div>
    </div>
@endforeach
