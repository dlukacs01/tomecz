@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid px-4">

        {{-- TITLE --}}
        <h1 class="mt-4">Projekt szerkesztése</h1>

        {{-- ERRORS --}}
        <x-forms.errors/>

        {{-- FORM --}}
        <x-admin.forms.projects.edit :$project :$categories />

    </div>
@endsection

@section('scripts')
    <x-admin.js.file/>
@endsection
