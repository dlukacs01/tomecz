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
                    <h1 class="text-center display-6 text-uppercase">{{ __('Kapcsolat') }}</h1>

                    <div class="text-center">

                        <p>{{ __('Tomecz Dániel') }}</p>
                        <p>{{ $user->address }}</p>
                        <p>{{ $user->phone }}</p>
                        <p>
                            <a href="mailto:{{ $user->email }}">{{ $user->email_protected }}</a>
                        </p>

                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <x-home.js.spinner/>
@endsection
