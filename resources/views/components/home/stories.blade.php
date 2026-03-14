@foreach($stories as $story)

    <!-- Featured blog post-->
    <div class="card mb-4">
        <a href="{{ route('story.show', [
            $story->slug,
            $story
        ]) }}"><img class="card-img-top featured-img" src="{{ $story->original }}" alt="{{ $story->title }}" /></a>
        <div class="card-body">
            <div class="small text-muted">{{ $story->formattedDate }}</div>
            <h2 class="card-title">{{ $story->title }}</h2>
            <p class="card-text">{!! nl2br(e($story->intro)) !!}</p>
            <a class="btn btn-primary" href="{{ route('story.show', [
                $story->slug,
                $story
            ]) }}">{{ __('Elolvasom') }} →</a>
        </div>
    </div>

@endforeach
