@extends('layouts.default')
@section('title', 'Актеры')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1>Актеры</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>Актер</th>
                    <th>Дата рождения</th>
                    <th>Количество фильмов</th>
                </tr>
                </thead>
                <tbody>
                @foreach($actors as $actor)
                    <tr>
                        <td>@include('components.actor_link', compact('actor'))</td>
                        <td>{{$actor->birth_date}}</td>
                        <td>{{$actor->films->count()}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
