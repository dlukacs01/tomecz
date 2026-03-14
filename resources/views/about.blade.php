@extends('layouts.app')

@section('nav')
    <x-home.nav/>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">

                {{-- SPINNER --}}
                <x-home.spinner/>

                <div id="spinner-content" style="display: none;">

                    {{-- TITLE --}}
                    <h1 class="text-center display-6 text-uppercase">{{ __('Tomecz Dániel') }}</h1>

                    {{-- CV --}}
                    <div class="text-center">
                        <p>{!! nl2br(e($user->cv)) !!}</p>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <x-home.js.spinner/>
@endsection
