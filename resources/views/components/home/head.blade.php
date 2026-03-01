<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="{{ getDescription() }}" />
    <meta name="keywords" content="{{ $keywords }}" />
    <meta name="author" content="{{ getAuthor() }}" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Favicon (must be after title) -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}"> {{-- TODO --}}

    <!-- Scripts -->
    @vite([
        'resources/css/custom/home/styles.css', // SB Home BS (v5.2.3)
        'resources/css/custom/home/app.css', // general
    ])

    <title>{!! $title !!}</title>
</head>

<!-- Google Analytics (must be after head) -->
<x-social.google.sdk/> {{-- TODO --}}
