@if($projects && $projects->isNotEmpty())
    <label for="project_id" class="form-label">Projekt</label>
    <select name="project_id"
            id="project_id"
            class="form-select @error('project_id') is-invalid @enderror"
            required
            aria-label="Projekt">

        <option value="" selected disabled>Válassz projektet</option>
        @foreach($projects as $project)
            <option value="{{ $project->id }}" {{ $project->id === $photo->project_id ? 'selected' : '' }}>
                {{ $project->title }}
            </option>
        @endforeach

    </select>
    <x-forms.error :name="'project_id'" />
@endif
