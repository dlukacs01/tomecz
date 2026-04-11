<form action="{{ route('admin.user.password.update', $user) }}" method="post">
    @csrf
    @method('PATCH')

    {{-- CURRENT_PASSWORD --}}
    <div class="mb-3">
        <label for="current_password" class="form-label">Jelenlegi jelszó</label>
        <input type="password"
               name="current_password"
               id="current_password"
               class="form-control @error('current_password') is-invalid @enderror"
               required
               minlength="8"
               maxlength="255"
               autofocus
               autocomplete="current_password"
               placeholder="A jelenlegi jelszó" />
        <div class="c-icon-container"><i class="fas fa-eye-slash" onclick="toggle(this, 'current_password')"></i></div>
        <x-forms.error :name="'current_password'" />
    </div>

    {{-- PASSWORD --}}
    <div class="mb-3">
        <label for="current_password" class="form-label">Új jelszó</label>
        <input type="password"
               name="password"
               id="password"
               class="form-control @error('password') is-invalid @enderror"
               required
               minlength="8"
               maxlength="255"
               autocomplete="password"
               placeholder="Az új jelszó"
               data-bs-toggle="tooltip" data-bs-placement="left" title="Legalább 8 karakter!" />
        <div class="c-icon-container"><i class="fas fa-eye-slash" onclick="toggle(this, 'password')"></i></div>
        <x-forms.error :name="'password'" />
    </div>

    {{-- PASSWORD_CONFIRMATION  --}}
    <div class="mb-3">
        <label for="current_password" class="form-label">Új jelszó mégegyszer</label>
        <input type="password"
               name="password_confirmation"
               id="password_confirmation"
               class="form-control @error('password_confirmation') is-invalid @enderror"
               required
               minlength="8"
               maxlength="255"
               autocomplete="password_confirmation"
               placeholder="Az új jelszó ismétlése" />
        <div class="c-icon-container"><i class="fas fa-eye-slash" onclick="toggle(this, 'password_confirmation')"></i></div>
        <x-forms.error :name="'password_confirmation'" />
    </div>

    {{-- BUTTON --}}
    <div class="d-grid gap-2 col-md-4 mb-3">
        <button type="submit" class="btn btn-primary">Mentés</button>
    </div>

</form>
