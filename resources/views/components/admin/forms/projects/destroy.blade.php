<form action="{{ route('admin.projects.destroy', $project) }}" method="post">
    @csrf
    @method('DELETE')

    <button type="submit"
            class="btn btn-danger"
            onclick="return confirm('{{ config('custom.confirm.projects', 'Biztosan törölni szeretnéd ezt a projektet?') }}')">Törlés</button>
</form>
