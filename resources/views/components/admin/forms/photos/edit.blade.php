<form action="{{ route('admin.photos.update', $photo) }}" method="post" enctype="multipart/form-data" id="photos-edit">
    @csrf
    @method('PATCH')

    {{-- POSITION --}}
    <div class="mb-3">
        <label for="position" class="form-label">Sorszám</label>
        <input type="number"
               name="position"
               id="position"
               class="form-control @error('position') is-invalid @enderror"
               required
               min="1"
               max="1000000000"
               autofocus
               autocomplete="position"
               placeholder="A mappa sorszáma"
               value="{{ $photo->position }}" />
        <x-forms.error :name="'position'" />
    </div>

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
               placeholder="A műtárgy címe"
               value="{{ $photo->title }}" />
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
               placeholder="A műtárgy címe (angolul)"
               value="{{ $photo->title_en }}" />
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
               value="{{ $photo->year }}" />
        <x-forms.error :name="'year'" />
    </div>

    {{-- SIZE --}}
    <div class="mb-3">
        <label for="size" class="form-label">Méretek</label>
        <input type="text"
               name="size"
               id="size"
               class="form-control @error('size') is-invalid @enderror"
               required
               minlength="3"
               maxlength="255"
               autocomplete="size"
               placeholder="A műtárgy méretei"
               value="{{ $photo->size }}" />
        <x-forms.error :name="'size'" />
    </div>

    {{-- TECHNIQUE --}}
    <div class="mb-3">
        <label for="technique" class="form-label">Technika</label>
        <input type="text"
               name="technique"
               id="technique"
               class="form-control @error('technique') is-invalid @enderror"
               required
               minlength="3"
               maxlength="255"
               autocomplete="technique"
               placeholder="Milyen technikával készült"
               value="{{ $photo->technique }}" />
        <x-forms.error :name="'technique'" />
    </div>

    {{-- TECHNIQUE_EN --}}
    <div class="mb-3">
        <label for="technique_en" class="form-label">Technika (angolul)</label>
        <input type="text"
               name="technique_en"
               id="technique_en"
               class="form-control @error('technique_en') is-invalid @enderror"
               minlength="3"
               maxlength="255"
               autocomplete="technique_en"
               placeholder="Milyen technikával készült (angolul)"
               value="{{ $photo->technique_en }}" />
        <x-forms.error :name="'technique_en'" />
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
               placeholder="A műtárgyhoz tartozó keresőszavak"
               value="{{ $photo->tags }}" />
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
               placeholder="A műtárgyhoz tartozó keresőszavak (angolul)"
               value="{{ $photo->tags_en }}" />
        <x-forms.error :name="'tags_en'" />
    </div>

    {{-- BODY --}}
    <div class="mb-3">
        <label for="body" class="form-label">Leírás</label>
        <textarea name="body"
                  id="body"
                  class="form-control @error('body') is-invalid @enderror mceNoEditor"
                  minlength="3"
                  maxlength="65535"
                  autocomplete="body"
                  placeholder="Leírás, ismertető, megjegyzések..."
                  rows="10">{{ $photo->body }}</textarea>
        <x-forms.error :name="'body'" />
    </div>

    {{-- BODY_EN --}}
    <div class="mb-3">
        <label for="body_en" class="form-label">Leírás (angolul)</label>
        <textarea name="body_en"
                  id="body_en"
                  class="form-control @error('body_en') is-invalid @enderror mceNoEditor"
                  minlength="3"
                  maxlength="65535"
                  autocomplete="body_en"
                  placeholder="Leírás, ismertető, megjegyzések... (angolul)"
                  rows="10">{{ $photo->body_en }}</textarea>
        <x-forms.error :name="'body_en'" />
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
                <option value="{{ $category->id }}" {{ $category->id == $photo->project->category_id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach

        </select>
        <x-forms.error :name="'category_id'" />
    </div>

    {{-- PROJECTS --}}
    <div class="mb-3" id="projects_container"></div>

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
               accept="image/*" />
        <x-forms.error :name="'original'" />
    </div>

    {{-- THUMBNAIL --}}
    <div class="mb-3">
        <img src="{{ $photo->thumbnail }}" alt="{{ $photo->title }}" class="c-thumbnail">
    </div>

    {{-- BUTTON --}}
    <div class="d-grid gap-2 col-md-4 mb-3">
        <button type="submit" class="btn btn-primary">Mentés</button>
    </div>

</form>
