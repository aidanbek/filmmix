@extends('layouts.default')
@section('title', 'Жанры')

@section('content')
    @include('components.title_row', ['title' => 'Жанры'])
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover table-bordered datatable-table">
                <thead>
                <tr>
                    <th>Название</th>
                    <th>Количество фильмов</th>
                </tr>
                </thead>
                <tbody>
                @foreach($genres as $genre)
                    <tr>
                        <td> @include('components.links.genre_link', compact('genre'))</td>
                        <td>{{$genre->films_count}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
