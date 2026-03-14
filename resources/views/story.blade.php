@extends('layouts.app')

@section('nav')
    <x-home.nav/>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                {{-- SPINNER --}}
                <x-home.spinner/>

                <div id="spinner-content" style="display: none;">

                    <!-- Post content-->
                    <article>

                        <!-- Post header-->
                        <header class="mb-4">

                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1">{{ $story->title }}</h1>

                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">{{ $story->formattedDate }}</div>

                            <!-- Post categories-->

                            {{-- TAGS --}}
                            @if($tags)
                                <p>
                                    @foreach($tags as $tag)
                                        <a href="{{ route('home.search', ['search' => $tag]) }}"
                                           class="badge bg-secondary text-decoration-none link-light">{{ $tag }}</a>
                                    @endforeach
                                </p>
                            @endif

                        </header>

                        <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid rounded featured-img" src="{{ $story->original }}" alt="{{ $story->title }}" /></figure>

                        <!-- Post content-->
                        <section class="mb-5">

                            <p>{!! nl2br(e($story->body)) !!}</p>

                        </section>
                    </article>

                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <x-home.js.spinner/>
@endsection
