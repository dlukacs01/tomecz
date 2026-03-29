@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid px-4">

        {{-- TITLE --}}
        <h1 class="mt-4">Projektek megtekintése</h1>

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
                        <th>Kategória</th>
                        <th>Létrehozva</th>
                        <th>Szerkesztés</th>
                        <th>Törlés</th>
                    </tr>
                </thead>

                {{-- BODY --}}
                <tbody>

                @foreach($projects as $project)

                    <tr>
                        <td class="align-middle">{{ $project->id }}</td>
                        <td>
                            <img src="{{ $project->original }}" alt="{{ $project->title }}" class="c-thumbnail">
                        </td>
                        <td class="align-middle">{{ $project->title }}</td>
                        <td class="align-middle">{{ $project->category->name }}</td>
                        <td class="align-middle">{{ $project->created_at->diffForHumans() }}</td>
                        <td class="align-middle">
                            <a class="btn btn-primary" href="{{ route('admin.projects.edit', $project) }}" role="button">
                                Szerkesztés
                            </a>
                        </td>
                        <td class="align-middle">
                            <x-admin.forms.projects.destroy :$project />
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>

    </div>

    {{-- PAGINATION --}}
    <x-admin.pagination :objects="$projects" />

@endsection

@section('scripts')
    <x-js.alert/>
@endsection
