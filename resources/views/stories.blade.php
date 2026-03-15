@extends('layouts.app')

@section('nav')
    <x-home.nav/>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                {{-- TITLE --}}
                <h1 class="text-center display-6 text-uppercase">{{ __('Hírek') }}</h1>

                {{-- SPINNER --}}
                <x-home.spinner/>

                <div id="spinner-content" style="display: none;">

                    {{-- STORIES --}}
                    <x-home.stories :$stories />

                    {{-- PAGINATION --}}
                    <x-home.pagination :objects="$stories" />

                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <x-home.js.spinner/>
@endsection
