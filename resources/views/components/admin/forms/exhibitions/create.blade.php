<form action="{{ route('admin.exhibitions.store') }}" method="post" enctype="multipart/form-data" id="exhibitions-create">
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
               placeholder="A kiállítás címe"
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
               minlength="3"
               maxlength="255"
               autocomplete="title_en"
               placeholder="A kiállítás címe (angolul)"
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
               max="{{ now()->year + 10  }}"
               autocomplete="year"
               placeholder="A kiállítás éve"
               value="{{ old('year') }}" />
        <x-forms.error :name="'year'" />
    </div>

    {{-- LOCATION --}}
    <div class="mb-3">
        <label for="location" class="form-label">Helyszín</label>
        <input type="text"
               name="location"
               id="location"
               class="form-control @error('location') is-invalid @enderror"
               required
               minlength="3"
               maxlength="255"
               autocomplete="location"
               placeholder="A kiállítás helyszíne"
               value="{{ old('location') }}" />
        <x-forms.error :name="'location'" />
    </div>

    {{-- STATUS_ID --}}
    <div class="mb-3">
        <label for="status_id" class="form-label">Kategória</label>
        <select name="status_id"
                id="status_id"
                class="form-select @error('status_id') is-invalid @enderror"
                required
                aria-label="Kategória">

            <option value="" selected disabled>Válassz kategóriát</option>
            @foreach($statuses as $status)
                <option value="{{ $status->id }}" {{ $status->id == old('status_id') ? 'selected' : '' }}>
                    {{ $status->name }}
                </option>
            @endforeach

        </select>
        <x-forms.error :name="'status_id'" />
    </div>

    {{-- ORIGINAL --}}
    <div class="mb-3">
        <label for="original" class="form-label mb-0">Képfájl</label>
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
