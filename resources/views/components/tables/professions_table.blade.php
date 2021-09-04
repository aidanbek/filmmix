<table class="table table-hover table-bordered datatable-table">
    <thead>
    <tr>
        <th>Название</th>
    </tr>
    </thead>
    <tbody>
    @foreach($professions as $profession)
        <tr>
            <td>@include('components.links.profession_link', compact('profession'))</td>
        </tr>
    @endforeach
    </tbody>
</table>
