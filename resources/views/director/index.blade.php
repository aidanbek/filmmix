@extends('layouts.default')
@section('title', 'Режиссеры')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>Режиссер</th>
                    <th>Количество фильмов</th>
                </tr>
                </thead>
                <tbody>
                @foreach($directors as $director)
                    <tr>
                        <td>@include('components.director_link', compact('director'))</td>
                        <td>{{$director->films->count()}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
