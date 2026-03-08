<x-home.spinner/>

<div id="spinner-content" class="mb-2" style="display: none;">
    <a data-fslightbox href="{{ $photo->original }}">
        <img src="{{ $photo->original }}" alt="{{ $photo->title }}" class="img-fluid">
    </a>
</div>
