<form action="{{ route('admin.videos.destroy', $video) }}" method="post">
    @csrf
    @method('DELETE')

    <button type="submit"
            class="btn btn-danger"
            onclick="return confirm('{{ config('custom.confirm.videos', 'Biztosan törölni szeretnéd ezt a videót?') }}')">Törlés</button>
</form>
