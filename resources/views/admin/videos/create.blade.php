@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid px-4">

        {{-- TITLE --}}
        <h1 class="mt-4">Videó létrehozása</h1>

        {{-- ERRORS --}}
        <x-forms.errors/>

        {{-- FORM --}}
        <x-admin.forms.videos.create/>

    </div>
@endsection

@section('scripts')
    <x-admin.js.file/>
@endsection
