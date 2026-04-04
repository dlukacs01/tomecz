<form action="{{ route('admin.photos.destroy', $photo) }}" method="post">
    @csrf
    @method('DELETE')

    <button type="submit"
            class="btn btn-danger"
            onclick="return confirm('{{ config('custom.confirm.photos', 'Biztosan törölni szeretnéd ezt a képet?') }}')">Törlés</button>
</form>
