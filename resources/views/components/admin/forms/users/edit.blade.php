<form action="{{ route('admin.users.update', $user) }}" method="post" enctype="multipart/form-data" id="users-edit">
    @csrf
    @method('PATCH')

    {{-- NAME --}}
    <div class="mb-3">
        <label for="name" class="form-label">Név</label>
        <input type="text"
               name="name"
               id="name"
               class="form-control c-auth-form-field @error('name') is-invalid @enderror"
               required
               minlength="3"
               maxlength="255"
               autofocus
               autocomplete="name"
               placeholder="Név"
               value="{{ $user->name }}" />
        <x-forms.error :name="'name'" />
    </div>

    {{-- EMAIL --}}
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email"
               name="email"
               id="email"
               class="form-control c-auth-form-field @error('email') is-invalid @enderror"
               required
               minlength="3"
               maxlength="255"
               autocomplete="email"
               placeholder="Email"
               value="{{ $user->email }}" />
        <x-forms.error :name="'email'" />
    </div>

    {{-- CV --}}
    <div class="mb-3">
        <label for="cv" class="form-label">Életrajz</label>
        <textarea name="cv"
                  id="cv"
                  class="form-control @error('cv') is-invalid @enderror"
                  minlength="3"
                  maxlength="65535"
                  autocomplete="cv"
                  placeholder="Életrajz..."
                  rows="10">{{ $user->cv }}</textarea>
        <x-forms.error :name="'cv'" />
    </div>

    {{-- CV_EN --}}
    <div class="mb-3">
        <label for="cv_en" class="form-label">Életrajz (angolul)</label>
        <textarea name="cv_en"
                  id="cv_en"
                  class="form-control @error('cv_en') is-invalid @enderror"
                  minlength="3"
                  maxlength="65535"
                  autocomplete="cv_en"
                  placeholder="Életrajz (angolul)..."
                  rows="10">{{ $user->cv_en }}</textarea>
        <x-forms.error :name="'cv_en'" />
    </div>

    {{-- PHONE --}}
    <div class="mb-3">
        <label for="phone" class="form-label">Telefonszám</label>
        <input type="tel"
               name="phone"
               id="phone"
               class="form-control c-auth-form-field @error('phone') is-invalid @enderror"
               minlength="3"
               maxlength="255"
               autocomplete="phone"
               placeholder="Telefonszám"
               value="{{ $user->phone }}" />
        <x-forms.error :name="'phone'" />
    </div>

    {{-- ADDRESS --}}
    <div class="mb-3">
        <label for="address" class="form-label">Lakcím</label>
        <input type="text"
               name="address"
               id="address"
               class="form-control c-auth-form-field @error('address') is-invalid @enderror"
               minlength="3"
               maxlength="255"
               autocomplete="address"
               placeholder="Lakcím"
               value="{{ $user->address }}" />
        <x-forms.error :name="'address'" />
    </div>

    {{-- FACEBOOK --}}
    <div class="mb-3">
        <label for="facebook" class="form-label">Facebook</label>
        <input type="url"
               name="facebook"
               id="facebook"
               class="form-control c-auth-form-field @error('facebook') is-invalid @enderror"
               minlength="3"
               maxlength="255"
               autocomplete="facebook"
               placeholder="Facebook"
               value="{{ $user->facebook }}" />
        <x-forms.error :name="'facebook'" />
    </div>

    {{-- INSTAGRAM --}}
    <div class="mb-3">
        <label for="instagram" class="form-label">Instagram</label>
        <input type="url"
               name="instagram"
               id="instagram"
               class="form-control c-auth-form-field @error('instagram') is-invalid @enderror"
               minlength="3"
               maxlength="255"
               autocomplete="instagram"
               placeholder="Instagram"
               value="{{ $user->instagram }}" />
        <x-forms.error :name="'instagram'" />
    </div>

    {{-- YOUTUBE --}}
    <div class="mb-3">
        <label for="youtube" class="form-label">YouTube</label>
        <input type="url"
               name="youtube"
               id="youtube"
               class="form-control c-auth-form-field @error('youtube') is-invalid @enderror"
               minlength="3"
               maxlength="255"
               autocomplete="youtube"
               placeholder="youtube"
               value="{{ $user->youtube }}" />
        <x-forms.error :name="'youtube'" />
    </div>

    {{-- BUTTON --}}
    <div class="d-grid gap-2 col-md-4 mb-3">
        <button type="submit" class="btn btn-primary">Mentés</button>
    </div>

</form>
