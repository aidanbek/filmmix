<table class="table table-hover table-bordered datatable-table">
    <caption>Люди</caption>
    <thead>
    <tr>
        <th>ФИО</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>@include('components.links.user_link', compact('user'))</td>
        </tr>
    @endforeach
    </tbody>
</table>
