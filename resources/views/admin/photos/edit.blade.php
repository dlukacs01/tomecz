@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid px-4">

        {{-- TITLE --}}
        <h1 class="mt-4">Kép szerkesztése</h1>

        {{-- ERRORS --}}
        <x-forms.errors/>

        {{-- FORM --}}
        <x-admin.forms.photos.edit :$photo :$categories />

    </div>
@endsection

@section('scripts')
    <x-admin.js.projects.edit :$photo />
    <x-admin.js.file/>
@endsection
