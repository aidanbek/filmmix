<table class="table table-hover table-bordered">
    <thead>
    <tr>
        <th>Название</th>
        <th>Год</th>
        <th>Жанр</th>
        <th>Режиссер</th>
        <th>Актерский состав</th>
    </tr>
    </thead>
    <tbody>
    @foreach($films as $film)
        <tr>
            <td>@include('components.film_link', compact('film'))</td>
            <td>{{$film->prod_year}}</td>
            <td>
                @foreach($film->genres as $genre)
                    @include('components.genre_link', compact('genre'))
                @endforeach
            </td>
            <td>
                @foreach($film->directors as $director)
                    @include('components.director_link', compact('director'))
                @endforeach
            </td>
            <td>
                @foreach($film->actors as $actor)
                    @include('components.actor_link', compact('actor'))
                @endforeach
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
