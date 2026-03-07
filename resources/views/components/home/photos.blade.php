@foreach($category->latestPhotos() as $photo)
    <div class="c-photo-item">
        <div class="c-ar-container">
            <img src="{{ $photo->original }}" alt="{{ $photo->title }}" class="c-ar-content">
        </div>

        <div class="c-photo-meta">
            <span class="text-start">{{ $photo->title }}</span>
            <span class="text-end text-secondary">{{ $photo->project->title }}</span>
        </div>
    </div>
@endforeach
