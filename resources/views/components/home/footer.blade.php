<footer class="py-4">
    <div class="container text-center">
        <p class="mb-3">

            {{-- SOCIAL --}}
            <a href="{{ config('custom.social.facebook.full', 'https://facebook.com/lukacsdavid') }}"
               target="_blank"
               class="small text-secondary me-1 c-text-underline-hover">Facebook</a>

            <a href="{{ config('custom.social.instagram.full', 'https://instagram.com/lukacsdavid') }}"
               target="_blank"
               class="small text-secondary me-1 c-text-underline-hover">Instagram</a>

            <a href="{{ config('custom.social.youtube.full', 'https://youtube.com/lukacsdavid') }}"
               target="_blank"
               class="small text-secondary me-1 c-text-underline-hover">Youtube</a>

        </p>

        {{-- LOCALE --}}
        <x-home.forms.locale />

        {{-- COPYRIGHT --}}
        <p class="d-inline-block small m-0 text-secondary">
            © {{ date('Y') }} {{ __('Tomecz Dániel') }} &middot; v{{ config('custom.version', 1.0) }}
        </p>

    </div>
</footer>
