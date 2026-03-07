@foreach($category->latestPhotos() as $photo)
    <div class="c-photo-item">
        <div class="c-ar-container">
            <img src="{{ $photo->original }}" alt="{{ $photo->title }}" class="c-ar-content">
        </div>

        <p class="c-photo-title">{{ $photo->title }}</p>
    </div>
@endforeach
