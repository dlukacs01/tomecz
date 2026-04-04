@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid px-4">

        {{-- TITLE --}}
        <h1 class="mt-4">Kép feltöltése</h1>

        {{-- FLASH --}}
        <x-flash/>

        {{-- USER HAS NO PROJECT --}}
        @if(!$allowed_project)

            <h3 class="mt-4 text-danger">
                Előbb létre kell hoznod legalább 1 projektet.
            </h3>

        @else

            {{-- ERRORS --}}
            <x-forms.errors/>

            {{-- FORM --}}
            <x-admin.forms.photos.create :$categories />

        @endif

    </div>
@endsection

@section('scripts')
    <x-admin.js.projects.create/>
    <x-admin.js.file/>
    <x-js.alert/>
@endsection
