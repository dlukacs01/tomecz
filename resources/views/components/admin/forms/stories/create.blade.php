<form action="{{ route('admin.stories.store') }}" method="post" enctype="multipart/form-data" id="stories-create">
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
               placeholder="A hír címe"
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
               placeholder="A hír címe (angolul)"
               value="{{ old('title_en') }}" />
        <x-forms.error :name="'title_en'" />
    </div>

    {{-- INTRO --}}
    <div class="mb-3">
        <label for="intro" class="form-label">Bevezető</label>
        <textarea name="intro"
                  id="intro"
                  class="form-control @error('intro') is-invalid @enderror mceNoEditor"
                  minlength="3"
                  maxlength="65535"
                  autocomplete="intro"
                  placeholder="Bevezető..."
                  rows="10">{{ old('intro') }}</textarea>
        <x-forms.error :name="'intro'" />
    </div>

    {{-- INTRO_EN --}}
    <div class="mb-3">
        <label for="intro_en" class="form-label">Bevezető (angolul)</label>
        <textarea name="intro_en"
                  id="intro_en"
                  class="form-control @error('intro_en') is-invalid @enderror mceNoEditor"
                  minlength="3"
                  maxlength="65535"
                  autocomplete="intro_en"
                  placeholder="Bevezető (angolul)..."
                  rows="10">{{ old('intro_en') }}</textarea>
        <x-forms.error :name="'intro_en'" />
    </div>

    {{-- BODY --}}
    <div class="mb-3">
        <label for="body" class="form-label">Tartalom</label>
        <textarea name="body"
                  id="body"
                  class="form-control @error('body') is-invalid @enderror mceNoEditor"
                  minlength="3"
                  maxlength="65535"
                  autocomplete="body"
                  placeholder="Tartalom..."
                  rows="10">{{ old('body') }}</textarea>
        <x-forms.error :name="'body'" />
    </div>

    {{-- BODY_EN --}}
    <div class="mb-3">
        <label for="body_en" class="form-label">Tartalom (angolul)</label>
        <textarea name="body_en"
                  id="body_en"
                  class="form-control @error('body_en') is-invalid @enderror mceNoEditor"
                  minlength="3"
                  maxlength="65535"
                  autocomplete="body_en"
                  placeholder="Tartalom... (angolul)"
                  rows="10">{{ old('body_en') }}</textarea>
        <x-forms.error :name="'body_en'" />
    </div>

    {{--TAGS --}}
    <div class="mb-3">
        <label for="tags" class="form-label mb-0">Keresőszavak</label>
        <p class="small mb-2">
            Vesszővel és szóközzel elválasztott, akár többszavas értékek. Pl.: virágok, növények, természet, trópusi esőerdő.
            Legfeljebb 20 érték a megengedett.
        </p>
        <input type="text"
               name="tags"
               id="tags"
               class="form-control @error('tags') is-invalid @enderror"
               minlength="3"
               maxlength="255"
               pattern="^[A-Za-zÁÉÍÓÖŐÚÜŰáéíóöőúüű0-9\-]+(?: [A-Za-zÁÉÍÓÖŐÚÜŰáéíóöőúüű0-9\-]+)*(, [A-Za-zÁÉÍÓÖŐÚÜŰáéíóöőúüű0-9\-]+(?: [A-Za-zÁÉÍÓÖŐÚÜŰáéíóöőúüű0-9\-]+)*){0,19}$"
               title="Vesszővel és szóközzel elválasztott értékek."
               autocomplete="tags"
               placeholder="A hírhez tartozó keresőszavak"
               value="{{ old('tags') }}" />
        <x-forms.error :name="'tags'" />
    </div>

    {{--TAGS_EN --}}
    <div class="mb-3">
        <label for="tags_en" class="form-label">Keresőszavak (angolul)</label>
        <input type="text"
               name="tags_en"
               id="tags_en"
               class="form-control @error('tags_en') is-invalid @enderror"
               minlength="3"
               maxlength="255"
               pattern="^[A-Za-zÁÉÍÓÖŐÚÜŰáéíóöőúüű0-9\-]+(?: [A-Za-zÁÉÍÓÖŐÚÜŰáéíóöőúüű0-9\-]+)*(, [A-Za-zÁÉÍÓÖŐÚÜŰáéíóöőúüű0-9\-]+(?: [A-Za-zÁÉÍÓÖŐÚÜŰáéíóöőúüű0-9\-]+)*){0,19}$"
               title="Vesszővel és szóközzel elválasztott értékek."
               autocomplete="tags_en"
               placeholder="A hírhez tartozó keresőszavak (angolul)"
               value="{{ old('tags_en') }}" />
        <x-forms.error :name="'tags_en'" />
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
