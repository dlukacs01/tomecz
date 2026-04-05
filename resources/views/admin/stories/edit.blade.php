@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid px-4">

        {{-- TITLE --}}
        <h1 class="mt-4">Hír szerkesztése</h1>

        {{-- ERRORS --}}
        <x-forms.errors/>

        {{-- FORM --}}
        <x-admin.forms.stories.edit :$story />

    </div>
@endsection

@section('scripts')
    <x-admin.js.file/>
@endsection
