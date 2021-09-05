@php /** @var App\Models\Tagline[] $taglines */ @endphp

<table class="table table-hover table-bordered datatable-table table-sm">
    <thead>
    <tr>
        <th>Текст</th>
        <th>Оригинальный текст</th>
    </tr>
    </thead>
    <tbody>
    @foreach($taglines as $tagline)
        <tr>
            <td>@include('components.links.tagline_link', compact('tagline'))</td>
            <td>{{$tagline->original_text}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
