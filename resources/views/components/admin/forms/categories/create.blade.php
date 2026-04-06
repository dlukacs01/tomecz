<form action="{{ route('admin.categories.store') }}" method="post">
    @csrf

    {{-- NAME --}}
    <div class="mb-3">
        <label for="name" class="form-label">Név</label>
        <input type="text"
               name="name"
               id="title"
               class="form-control @error('name') is-invalid @enderror"
               required
               minlength="3"
               maxlength="255"
               autofocus
               autocomplete="name"
               placeholder="A kategória neve"
               value="{{ old('name') }}" />
        <x-forms.error :name="'name'" />
    </div>

    {{-- NAME_EN --}}
    <div class="mb-3">
        <label for="name_en" class="form-label">Név (angolul)</label>
        <input type="text"
               name="name_en"
               id="name_en"
               class="form-control @error('name_en') is-invalid @enderror"
               required
               minlength="3"
               maxlength="255"
               autocomplete="name_en"
               placeholder="A kategória neve (angolul)"
               value="{{ old('name_en') }}" />
        <x-forms.error :name="'name_en'" />
    </div>

    {{-- BUTTON --}}
    <div class="d-grid gap-2 col-md-4 mb-3">
        <button type="submit" class="btn btn-primary">Mentés</button>
    </div>

</form>
