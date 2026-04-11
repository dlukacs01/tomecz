@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid px-4">

        {{-- TITLE --}}
        <h1 class="mt-4">Képek megtekintése: {{ $project->title }}</h1>

        {{-- FLASH --}}
        <x-flash/>

        {{-- TABLE --}}
        <div class="table-responsive">
            <table class="table table-hover">

                {{-- HEAD --}}
                <thead>
                <tr>
                    <th>Sorszám</th>
                    <th>Kép</th>
                    <th>Cím</th>
                    <th>Megtekintések</th>
                    <th>Létrehozva</th>
                    <th>Szerkesztés</th>
                    <th>Törlés</th>
                </tr>
                </thead>

                {{-- BODY --}}
                <tbody>

                @foreach($photos as $photo)

                    <tr>
                        <td class="align-middle">{{ $photo->position }}</td>
                        <td>
                            <img src="{{ $photo->original }}" alt="{{ $photo->title }}" class="c-thumbnail">
                        </td>
                        <td class="align-middle">{{ $photo->title }}</td>
                        <td class="align-middle">{{ $photo->views }}</td>
                        <td class="align-middle">{{ $photo->created_at->diffForHumans() }}</td>
                        <td class="align-middle">
                            <a class="btn btn-primary" href="{{ route('admin.photos.edit', $photo) }}" role="button">
                                Szerkesztés
                            </a>
                        </td>
                        <td class="align-middle">
                            <x-admin.forms.photos.destroy :$photo />
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>

    </div>

    {{-- PAGINATION --}}
    <x-admin.pagination :objects="$photos" />

@endsection

@section('scripts')
    <x-js.alert/>
@endsection
