<table class="table table-hover table-bordered datatable-table">
    <thead>
    <tr>
        <th>Название</th>
        <th>Год</th>
        <th>Страна</th>
        <th>Жанр</th>
        <th>Режиссер</th>
        <th>Актерский состав</th>
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
            <td>
                @foreach($film->directors as $director)
                    @include('components.links.director_link', compact('director'))
                @endforeach
            </td>
            <td>
                @foreach($film->actors as $actor)
                    @include('components.links.actor_link', compact('actor'))
                @endforeach
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
