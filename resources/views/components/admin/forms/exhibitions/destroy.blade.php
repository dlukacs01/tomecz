<form action="{{ route('admin.exhibitions.destroy', $exhibition) }}" method="post">
    @csrf
    @method('DELETE')

    <button type="submit"
            class="btn btn-danger"
            onclick="return confirm('{{ config('custom.confirm.exhibitions', 'Biztosan törölni szeretnéd ezt a kiállítást?') }}')">Törlés</button>
</form>
