@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Название</th>
                    <th>Год</th>
                    <th>Режиссер</th>
                    <th>Актерский состав</th>
                </tr>
                </thead>
                <tbody>
                @foreach($films as $film)
                    <tr>
                        <td><a href="{{route('films.show', $film->id)}}">{{$film->title}}</a></td>
                        <td>{{$film->prod_year}}</td>
                        <td>
                            @foreach($film->directors as $director)
                                <a class="text-decoration-none" href="{{route('directors.show', $director->id)}}">{{$director->title}}</a>
                            @endforeach
                        </td>
                        <td>
                            @foreach($film->actors as $actor)
                                <a class="text-decoration-none" href="{{route('actors.show', $actor->id)}}">{{$actor->title}}</a>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
