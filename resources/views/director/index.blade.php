@extends('layouts.default')
@section('title', 'Режиссеры')

@section('content')
    @include('components.title_row', ['title' => 'Режиссеры'])
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover table-bordered datatable-table">
                <thead>
                <tr>
                    <th>Режиссер</th>
                    <th>Дата рождения</th>
                    <th>Количество фильмов</th>
                </tr>
                </thead>
                <tbody>
                @foreach($directors as $director)
                    <tr>
                        <td>@include('components.director_link', compact('director'))</td>
                        <td>{{$director->birth_date}}</td>
                        <td>{{$director->films->count()}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
