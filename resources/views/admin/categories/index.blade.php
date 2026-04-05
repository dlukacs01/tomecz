@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid px-4">

        {{-- TITLE --}}
        <h1 class="mt-4">Kategóriák megtekintése</h1>

        {{-- FLASH --}}
        <x-flash/>

        {{-- TABLE --}}
        <div class="table-responsive">
            <table class="table table-hover">

                {{-- HEAD --}}
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Név</th>
                        <th>Létrehozva</th>
                        <th>Szerkesztés</th>
                        <th>Törlés</th>
                    </tr>
                </thead>

                {{-- BODY --}}
                <tbody>

                @foreach($categories as $category)

                    <tr>
                        <td class="align-middle">{{ $category->id }}</td>
                        <td class="align-middle">{{ $category->name }}</td>
                        <td class="align-middle">{{ $category->created_at->diffForHumans() }}</td>
                        <td class="align-middle">
                            <a class="btn btn-primary" href="{{ route('admin.categories.edit', $category) }}" role="button">
                                Szerkesztés
                            </a>
                        </td>
                        <td class="align-middle">
                            <x-admin.forms.categories.destroy :$category />
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>

    </div>

    {{-- PAGINATION --}}
    <x-admin.pagination :objects="$categories" />

@endsection

@section('scripts')
    <x-js.alert/>
@endsection
