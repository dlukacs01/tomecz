<form action="{{ route('admin.categories.destroy', $category) }}" method="post">
    @csrf
    @method('DELETE')

    <button type="submit"
            class="btn btn-danger"
            onclick="return confirm('{{ config('custom.confirm.categories', 'Biztosan törölni szeretnéd ezt a kategóriát?') }}')">Törlés</button>
</form>
