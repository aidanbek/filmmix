@extends('layouts.default')
@section('title', 'Страны')

@section('content')
    @include('components.title_row', ['title' => 'Страны'])
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover table-bordered datatable-table">
                <thead>
                <tr>
                    <th>Название</th>
                    <th>Количество фильмов</th>
                    <th>Количество актеров</th>
                    <th>Количество режиссеров</th>
                </tr>
                </thead>
                <tbody>
                @foreach($countries as $country)
                    <tr>
                        <td> @include('components.links.country_link', compact('country'))</td>
                        <td>{{$country->films_count}}</td>
                        <td>{{$country->actors_count}}</td>
                        <td>{{$country->directors_count}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
