@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Актер</th>
                    <th>Количество фильмов</th>
                </tr>
                </thead>
                <tbody>
                @foreach($actors as $actor)
                    <tr>
                        <td>@include('components.actor_link', compact('actor'))</td>
                        <td>{{$actor->films->count()}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
