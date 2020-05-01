@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>Название</th>
                    <th>Год</th>
                    <th>Жанр</th>
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
                            @foreach($film->genres as $genre)
                                @include('components.genre_link', compact('genre'))
                            @endforeach
                        </td>
                        <td>
                            @foreach($film->directors as $director)
                                @include('components.director_link', compact('director'))
                            @endforeach
                        </td>
                        <td>
                            @foreach($film->actors as $actor)
                                @include('components.actor_link', compact('actor'))
                            @endforeach
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
