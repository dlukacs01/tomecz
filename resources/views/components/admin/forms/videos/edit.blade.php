<form action="{{ route('admin.videos.update', $video) }}" method="post" enctype="multipart/form-data" id="videos-edit">
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
               placeholder="A videó sorszáma"
               value="{{ $video->position }}" />
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
               placeholder="A videó címe"
               value="{{ $video->title }}" />
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
               placeholder="A videó címe (angolul)"
               value="{{ $video->title_en }}" />
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
               value="{{ $video->year }}" />
        <x-forms.error :name="'year'" />
    </div>

    {{-- URL --}}
    <div class="mb-3">
        <label for="url" class="form-label">URL</label>
        <input type="url"
               name="url"
               id="url"
               class="form-control @error('url') is-invalid @enderror"
               required
               minlength="3"
               maxlength="255"
               autocomplete="url"
               placeholder="A videó URL címe (link)"
               value="{{ $video->url }}" />
        <x-forms.error :name="'url'" />
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
                  rows="10">{{ $video->body }}</textarea>
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
                  rows="10">{{ $video->body_en }}</textarea>
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
               required
               minlength="3"
               maxlength="255"
               pattern="^[A-Za-zÁÉÍÓÖŐÚÜŰáéíóöőúüű0-9\-]+(?: [A-Za-zÁÉÍÓÖŐÚÜŰáéíóöőúüű0-9\-]+)*(, [A-Za-zÁÉÍÓÖŐÚÜŰáéíóöőúüű0-9\-]+(?: [A-Za-zÁÉÍÓÖŐÚÜŰáéíóöőúüű0-9\-]+)*){0,19}$"
               title="Vesszővel és szóközzel elválasztott értékek."
               autocomplete="tags"
               placeholder="A videóhoz tartozó keresőszavak"
               value="{{ $video->tags }}" />
        <x-forms.error :name="'tags'" />
    </div>

    {{--TAGS_EN --}}
    <div class="mb-3">
        <label for="tags_en" class="form-label">Keresőszavak (angolul)</label>
        <input type="text"
               name="tags_en"
               id="tags_en"
               class="form-control @error('tags_en') is-invalid @enderror"
               required
               minlength="3"
               maxlength="255"
               pattern="^[A-Za-zÁÉÍÓÖŐÚÜŰáéíóöőúüű0-9\-]+(?: [A-Za-zÁÉÍÓÖŐÚÜŰáéíóöőúüű0-9\-]+)*(, [A-Za-zÁÉÍÓÖŐÚÜŰáéíóöőúüű0-9\-]+(?: [A-Za-zÁÉÍÓÖŐÚÜŰáéíóöőúüű0-9\-]+)*){0,19}$"
               title="Vesszővel és szóközzel elválasztott értékek."
               autocomplete="tags_en"
               placeholder="A videóhoz tartozó keresőszavak (angolul)"
               value="{{ $video->tags_en }}" />
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
               accept="image/*" />
        <x-forms.error :name="'original'" />
    </div>

    {{-- THUMBNAIL --}}
    <div class="mb-3">
        <img src="{{ $video->original }}" alt="{{ $video->title }}" class="c-thumbnail">
    </div>

    {{-- BUTTON --}}
    <div class="d-grid gap-2 col-md-4 mb-3">
        <button type="submit" class="btn btn-primary">Mentés</button>
    </div>

</form>
