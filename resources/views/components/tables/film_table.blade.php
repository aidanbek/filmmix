@php /** @var App\Models\Film[] $films */ @endphp

<table class="table table-hover table-bordered datatable-table table-sm">
    <thead>
    <tr>
        <th>Название</th>
        <th>Год</th>
        <th>Страна</th>
        <th>Жанр</th>
    </tr>
    </thead>
    <tbody>
    @foreach($films as $film)
        <tr>
            <td>@include('components.links.film_link', compact('film'))</td>
            <td>{{$film->prod_year}}</td>
            <td>
                @foreach($film->countries as $country)
                    @include('components.links.country_link', compact('country'))
                @endforeach
            </td>
            <td>
                @foreach($film->genres as $genre)
                    @include('components.links.genre_link', compact('genre'))
                @endforeach
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
