<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="{{ getDescription() }}" />
    <meta name="keywords" content="{{ $keywords }}" />
    <meta name="author" content="{{ getAuthor() }}" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{!! $title !!}</title>

    <!-- Favicon (must be after title) -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}"> {{-- TODO --}}

    <!-- Scripts -->
    @vite([
        'resources/css/custom/admin/styles.css', // SB Admin BS (v5.2.3)
        'resources/css/fas.css', // font awesome imports
        'resources/css/custom/admin/app.css', // general
        'resources/css/custom/admin/img.css',
        'resources/css/custom/admin/pagination.css',
    ])
</head>

<!-- Google Analytics (must be after head) -->
<x-social.google.sdk/> {{-- TODO --}}
