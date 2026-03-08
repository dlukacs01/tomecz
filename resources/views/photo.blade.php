@extends('layouts.app')

@section('nav')
    <x-home.nav/>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            {{-- LEFT --}}
            <div class="col-md-8">

                {{-- TITLE --}}
                <x-home.breadcrumb.photo :$photo />

                {{-- PHOTO --}}
                <x-home.photo :$photo />

                {{-- TAGS --}}
                @if($tags)
                    <p>
                        @foreach($tags as $tag)
                            <a href="{{ route('home.search', ['search' => $tag]) }}"
                               class="text-secondary text-decoration-none">{{ $tag }}</a>@if(!$loop->last),@endif
                        @endforeach
                    </p>
                @endif

                {{-- BODY --}}
                @if($photo->body)
                    <p class="fw-bold">{{ __('Megjegyzések') }}:</p>
                    <p>{!! strip_tags(nl2br($photo->body), '<br>') !!}</p>
                @endif

            </div>

            {{-- RIGHT --}}
            <div class="col-md-2">

                {{-- TITLE --}}
                <h1>{{ $photo->title }}</h1>

                <hr>

                {{-- DETAILS --}}
                <p>{{ __('Év') }}: {{ $photo->year }}</p>
                <p>{{ __('Méretek') }}: {{ $photo->size }}</p>
                <p>{{ __('Technika') }}: {{ $photo->technique }}</p>

                {{-- PAGINATION --}}
                @if($previous)
                    <a href="{{ route('photo.show', [
                        'category_slug' => $previous->project->category->slug,
                        'project_slug' => $previous->project->slug,
                        'photo_slug' => $previous->slug,
                        'photo' => $previous->id
                    ]) }}" class="text-secondary text-decoration-none float-start">{{ __('Előző') }}</a>
                @endif

                @if($next)
                    <a href="{{ route('photo.show', [
                        'category_slug' => $next->project->category->slug,
                        'project_slug' => $next->project->slug,
                        'photo_slug' => $next->slug,
                        'photo' => $next->id
                    ]) }}" class="text-secondary text-decoration-none float-end">{{ __('Következő') }}</a>
                @endif

            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <x-home.js.spinner/>
@endsection
