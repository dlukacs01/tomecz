<form action="{{ route('home.locale') }}" method="post" class="d-inline-block">
    @csrf
    <select name="locale" id="locale" class="small text-secondary" onchange="this.form.submit()">
        <option value="hu" {{ app()->getLocale() === 'hu' ? 'selected' : ''}}>Magyar</option>
        <option value="en" {{ app()->getLocale() === 'en' ? 'selected' : ''}}>English</option>
    </select>
</form>
