@foreach($videos as $video)
    <div class="c-photo-item">

        <a href="{{ $video->url }}">
            <div class="c-ar-container">
                <img src="{{ $video->original }}" alt="{{ $video->title }}" class="c-ar-content">
            </div>
        </a>

        <div class="c-photo-meta">
            <span class="text-start">{{ $video->title }}</span>
            <span class="text-end">{{ $video->year }}</span>
        </div>
    </div>
@endforeach
