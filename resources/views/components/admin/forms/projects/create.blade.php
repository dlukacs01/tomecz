<form action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    {{-- TITLE --}}
    <div class="mb-3">
        <label for="title" class="form-label">Cím</label>
        <input type="text"
               name="title"
               id="title"
               class="form-control @error('title') is-invalid @enderror"
               required
               minlength="3"
               maxlength="255"
               autofocus
               autocomplete="title"
               placeholder="A projekt címe"
               value="{{ old('title') }}" />
        <x-forms.error :name="'title'" />
    </div>

    {{-- TITLE_EN --}}
    <div class="mb-3">
        <label for="title_en" class="form-label">Cím (angolul)</label>
        <input type="text"
               name="title_en"
               id="title_en"
               class="form-control @error('title_en') is-invalid @enderror"
               required
               minlength="3"
               maxlength="255"
               autocomplete="title_en"
               placeholder="A projekt címe (angolul)"
               value="{{ old('title_en') }}" />
        <x-forms.error :name="'title_en'" />
    </div>

    {{-- YEAR --}}
    <div class="mb-3">
        <label for="year" class="form-label">Év</label>
        <input type="number"
               name="year"
               id="year"
               class="form-control @error('year') is-invalid @enderror"
               required
               min="1900"
               max="{{ date('Y') }}"
               autocomplete="year"
               placeholder="A készítés éve"
               value="{{ old('year') }}" />
        <x-forms.error :name="'year'" />
    </div>

    {{-- CATEGORY_ID --}}
    <div class="mb-3">
        <label for="category_id" class="form-label">Kategória</label>
        <select name="category_id"
                id="category_id"
                class="form-select @error('category_id') is-invalid @enderror"
                required
                aria-label="Kategória">

            <option value="" selected disabled>Válassz kategóriát</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach

        </select>
        <x-forms.error :name="'category_id'" />
    </div>

    {{-- ORIGINAL --}}
    <div class="mb-3">
        <label for="original" class="form-label mb-0">Borító</label>
        <p class="small mb-0">Legfeljebb {{ config('custom.validations.filesize.display.max', 30) }} MB-os fájlméret!</p>
        <p class="small mb-2">
            Megengedett formátumok: {{ getExtensions() }}.
            TIFF és PSD fájlok feltöltése nem lehetséges!
        </p>
        <input type="file"
               name="original"
               id="original"
               class="form-control @error('original') is-invalid @enderror"
               required
               accept="image/*" />
        <x-forms.error :name="'original'" />
    </div>

    {{-- BUTTON --}}
    <div class="d-grid gap-2 col-md-4 mb-3">
        <button type="submit" class="btn btn-primary">Mentés</button>
    </div>

</form>
