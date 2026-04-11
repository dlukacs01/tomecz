@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid px-4">

        {{-- TITLE --}}
        <h1 class="mt-4">Profil szerkesztése</h1>

        {{-- SUBTITLE --}}
        <p class="text-danger small">
            Figyelem! A munkamenet inaktivitás esetén lejár, ezért célszerű minél gyakrabban menteni a beállításokat!
        </p>

        {{-- FLASH --}}
        <x-flash/>

        {{-- ERRORS --}}
        <x-forms.errors/>

        {{-- FORM --}}
        <x-admin.forms.users.edit :$user />

    </div>
@endsection

@section('scripts')
    <x-admin.js.tinymce/>
    <x-admin.js.tinymce.users.edit/>
    <x-js.alert/>
@endsection
