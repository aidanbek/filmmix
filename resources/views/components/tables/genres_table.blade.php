@php /** @var App\Models\Genre[] $genres */ @endphp

<table class="table table-hover table-bordered datatable-table table-sm">
    <thead>
    <tr>
        <th>Название</th>
        <th>Количество фильмов</th>
    </tr>
    </thead>
    <tbody>
    @foreach($genres as $genre)
        <tr>
            <td>@include('components.links.genre_link', compact('genre'))</td>
            <td>{{$genre->films_count}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
