@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid px-4">

        {{-- TITLE --}}
        <h1 class="mt-4">Hírek megtekintése</h1>

        {{-- FLASH --}}
        <x-flash/>

        {{-- TABLE --}}
        <div class="table-responsive">
            <table class="table table-hover">

                {{-- HEAD --}}
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Borító</th>
                    <th>Cím</th>
                    <th>Létrehozva</th>
                    <th>Szerkesztés</th>
                    <th>Törlés</th>
                </tr>
                </thead>

                {{-- BODY --}}
                <tbody>

                @foreach($stories as $story)

                    <tr>
                        <td class="align-middle">{{ $story->id }}</td>
                        <td>
                            <img src="{{ $story->original }}" alt="{{ $story->title }}" class="c-thumbnail">
                        </td>
                        <td class="align-middle">{{ $story->title }}</td>
                        <td class="align-middle">{{ $story->created_at->diffForHumans() }}</td>
                        <td class="align-middle">
                            <a class="btn btn-primary" href="{{ route('admin.stories.edit', $story) }}" role="button">
                                Szerkesztés
                            </a>
                        </td>
                        <td class="align-middle">
                            <x-admin.forms.stories.destroy :$story />
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>

    </div>

    {{-- PAGINATION --}}
    <x-admin.pagination :objects="$stories" />

@endsection

@section('scripts')
    <x-js.alert/>
@endsection
