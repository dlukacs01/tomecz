<footer class="py-4">
    <div class="container text-center">
        <p class="mb-3">

            {{-- SOCIAL --}}
            <a href="{{ config('custom.social.facebook.full', 'https://www.facebook.com/dani.tomecz') }}"
               target="_blank"
               class="small text-secondary me-1 c-text-underline-hover">Facebook</a>

            <a href="{{ config('custom.social.instagram.full', 'https://www.instagram.com/tomeczdaniel') }}"
               target="_blank"
               class="small text-secondary me-1 c-text-underline-hover">Instagram</a>

            <a href="{{ config('custom.social.youtube.full', 'https://www.youtube.com/@tomeczdaniel617') }}"
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
