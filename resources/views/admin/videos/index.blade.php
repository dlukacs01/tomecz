@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid px-4">

        {{-- TITLE --}}
        <h1 class="mt-4">Videók megtekintése</h1>

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

                @foreach($videos as $video)

                    <tr>
                        <td class="align-middle">{{ $video->position }}</td>
                        <td>
                            <img src="{{ $video->original }}" alt="{{ $video->title }}" class="c-thumbnail">
                        </td>
                        <td class="align-middle">{{ $video->title }}</td>
                        <td class="align-middle">{{ $video->views }}</td>
                        <td class="align-middle">{{ $video->created_at->diffForHumans() }}</td>
                        <td class="align-middle">
                            <a class="btn btn-primary" href="{{ route('admin.videos.edit', $video) }}" role="button">
                                Szerkesztés
                            </a>
                        </td>
                        <td class="align-middle">
                            <x-admin.forms.videos.destroy :$video />
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>

    </div>

    {{-- PAGINATION --}}
    <x-admin.pagination :objects="$videos" />

@endsection

@section('scripts')
    <x-js.alert/>
@endsection
