@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid px-4">

        {{-- TITLE --}}
        <h1 class="mt-4">Kiállítások megtekintése</h1>

        {{-- FLASH --}}
        <x-flash/>

        {{-- TABLE --}}
        <div class="table-responsive">
            <table class="table table-hover">

                {{-- HEAD --}}
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Meghívó</th>
                    <th>Cím</th>
                    <th>Státusz</th>
                    <th>Létrehozva</th>
                    <th>Szerkesztés</th>
                    <th>Törlés</th>
                </tr>
                </thead>

                {{-- BODY --}}
                <tbody>

                @foreach($exhibitions as $exhibition)

                    <tr>
                        <td class="align-middle">{{ $exhibition->id }}</td>
                        <td>
                            <img src="{{ $exhibition->original }}" alt="{{ $exhibition->title }}" class="c-thumbnail">
                        </td>
                        <td class="align-middle">{{ $exhibition->title }}</td>
                        <td class="align-middle">{{ $exhibition->status->name }}</td>
                        <td class="align-middle">{{ $exhibition->created_at->diffForHumans() }}</td>
                        <td class="align-middle">
                            <a class="btn btn-primary" href="{{ route('admin.exhibitions.edit', $exhibition) }}" role="button">
                                Szerkesztés
                            </a>
                        </td>
                        <td class="align-middle">
                            <x-admin.forms.exhibitions.destroy :$exhibition />
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>

    </div>

    {{-- PAGINATION --}}
    <x-admin.pagination :objects="$exhibitions" />

@endsection

@section('scripts')
    <x-js.alert/>
@endsection
