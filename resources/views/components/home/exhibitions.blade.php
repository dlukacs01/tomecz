@foreach($exhibitions as $exhibition)
    <tr>
        <td>{{ $exhibition->year }}</td>
        <td>{{ $exhibition->title }}</td>
        <td>{{ $exhibition->location }}</td>
        <td>
            <a href="{{ $exhibition->original }}" target="_blank">{{ __('Meghívó') }}</a>
        </td>
        <td>{{ $exhibition->status->name }}</td>
    </tr>
@endforeach
