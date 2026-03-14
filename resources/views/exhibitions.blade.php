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
                    <table class="table">
                        <tbody>

                            @foreach($exhibitions as $exhibition)
                                <tr>
                                    <td>{{ $exhibition->year }}</td>
                                    <td>{{ $exhibition->title }}</td>
                                    <td>{{ $exhibition->location }}</td>
                                    <td>
                                        <a href="{{ $exhibition->original }}" target="_blank">Meghívó</a>
                                    </td>
                                    <td>{{ $exhibition->status->name }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <x-home.js.spinner/>
@endsection
