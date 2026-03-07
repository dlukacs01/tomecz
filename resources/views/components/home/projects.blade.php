@foreach($category->projects as $project)
    <div class="c-photo-item">
        <div class="c-ar-container">
            <img src="{{ $project->original }}" alt="{{ $project->title }}" class="c-ar-content">
        </div>

        <p class="text-center text-secondary">{{ $project->title }}</p>
    </div>
@endforeach
