<form action="{{ route('admin.stories.destroy', $story) }}" method="post">
    @csrf
    @method('DELETE')

    <button type="submit"
            class="btn btn-danger"
            onclick="return confirm('{{ config('custom.confirm.stories', 'Biztosan törölni szeretnéd ezt a hírt?') }}')">Törlés</button>
</form>
