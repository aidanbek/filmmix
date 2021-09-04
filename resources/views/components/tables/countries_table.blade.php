<table class="table table-hover table-bordered datatable-table">
    <thead>
    <tr>
        <th>Название</th>
        <th>Количество фильмов</th>
        <th>Количество людей</th>
    </tr>
    </thead>
    <tbody>
    @foreach($countries as $country)
        <tr>
            <td> @include('components.links.country_link', compact('country'))</td>
            <td>{{$country->films_count}}</td>
            <td>{{$country->users_count}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
