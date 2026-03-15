@extends('layouts.app')

@section('nav')
    <x-home.nav/>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">

                {{-- TITLE --}}
                <p class="fw-bold">{{ __('Találatok a következőre') }}: "{{ $search }}"</p>

                {{-- SPINNER --}}
                <x-home.spinner/>

                <div id="spinner-content" style="display: none;">

                    {{-- VIDEOS --}}
                    <p class="text-muted fw-semibold">
                        {{ __('Videók') }} <span class="fw-normal">({{ count($videos) }})</span>
                    </p>
                    <div class="c-grid c-grid--2-cols">
                        <x-home.videos :$videos />
                    </div>

                    {{-- PHOTOS --}}
                    <p class="text-muted fw-semibold">
                        {{ __('Műtárgyak') }} <span class="fw-normal">({{ $photos->total() }})</span>
                    </p>
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
