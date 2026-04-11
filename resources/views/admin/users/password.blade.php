@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid px-4">

        {{-- TITLE --}}
        <h1 class="mt-4">Jelszócsere</h1>

        {{-- FLASH --}}
        <x-flash/>

        {{-- ERRORS --}}
        <x-forms.errors/>

        {{-- FORM --}}
        <x-admin.forms.users.password :$user />

    </div>
@endsection

@section('scripts')
    <x-js.toggle/>
    <x-js.tooltip/>
    <x-js.alert/>
@endsection
