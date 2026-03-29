@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Siker!</strong> {{ session('success') }}
    </div>
@endif
