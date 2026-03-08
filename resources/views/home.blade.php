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

                    {{-- CATEGORIES --}}
                    @foreach($categories as $category)

                        {{-- TITLE --}}
                        <h1 class="text-center display-6 text-uppercase">{{ $category->name }}</h1>

                        {{-- PHOTOS --}}
                        <div class="c-grid c-grid--2-cols">
                            <x-home.home :$category />
                        </div>

                    @endforeach

                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <x-home.js.spinner/>
@endsection
