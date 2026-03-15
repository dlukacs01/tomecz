@extends('layouts.app')

@section('nav')
    <x-home.nav/>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">

                {{-- TITLE --}}
                <x-home.breadcrumb.project :$project />

                {{-- SPINNER --}}
                <x-home.spinner/>

                <div id="spinner-content" style="display: none;">

                    {{-- PHOTOS --}}
                    <div class="c-grid c-grid--2-cols">
                        <x-home.photos :$photos />
                    </div>

                </div>

                {{-- PAGINATION --}}
                <x-home.pagination :objects="$photos" />

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <x-home.js.spinner/>
@endsection
