<form action="{{ route('home.search') }}" method="get" class="d-inline w-50 ms-auto">
    <div class="mt-1 mt-sm-0 c-search-container">
        <i class="fas fa-search c-icon-search"></i>
        <input type="text"
               name="search"
               id="search"
               class="form-control form-control-sm"
               required
               minlength="3"
               maxlength="255"
               placeholder="{{ __('Keresés') }}" />
    </div>
</form>
