@extends('layouts.default')
@section('title', $film->title.' ('.$film->prod_year.')')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="jumbotron">
                <h1 class="display-4">{{$film->title}}
                    @if(!is_null($film->prod_year))
                        <span class="badge badge-light">{{$film->prod_year}}</span>
                    @endif
                </h1>
                @foreach($film->genres as $genre)
                    <a href="{{route('genres.show', $genre->id)}}" class="badge badge-primary">{{$genre->title}}</a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <b>Режиссеры:</b>
            @foreach($film->directors as $director)
                @include('components.director_link', compact('director'))
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <b>Актеры:</b>
            @foreach($film->actors as $actor)
                @include('components.actor_link', compact('actor'))
            @endforeach
        </div>
    </div>
    <div class="row my-3">
        <div class="col-sm-12">
            <button type="button"
                    class="btn btn-outline-primary btn-sm"
                    data-toggle="modal"
                    data-target="#edit_film">
                Редактировать
            </button>
            @if($film->actors->count() === 0 && $film->directors->count() === 0)
                <button type="button"
                        class="btn btn-outline-danger btn-sm"
                        data-toggle="modal"
                        data-target="#delete_film">Удалить
                </button>
            @endif
        </div>
    </div>

    <div class="modal fade" id="edit_film" tabindex="-1" role="dialog" aria-labelledby="edit_film_title"
         aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_film_title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('films.update', $film->id)}}" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-9">
                                    <label for="title">Название</label>
                                    <input type="text" class="form-control" name="title" id="title"
                                           value="{{$film->title}}">
                                </div>
                                <div class="col-sm-3">
                                    <label for="prod_year">Год</label>
                                    <input type="number" class="form-control" name="prod_year" id="prod_year"
                                           value="{{$film->prod_year}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="genres">Жанры</label>
                                    <select class="selectpicker form-control" name="genres[]" multiple
                                            data-live-search="true">
                                        @php $currentGenres = $film->genres->pluck('id')->toArray(); @endphp
                                        @foreach($genres as $genre)
                                            @if(in_array($genre->id, $currentGenres))
                                                <option selected value="{{$genre->id}}">{{$genre->title}}</option>
                                            @else
                                                <option value="{{$genre->id}}">{{$genre->title}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="genres">Режиссеры</label>
                                    <select class="selectpicker form-control" name="directors[]" multiple
                                            data-live-search="true">
                                        @php $currentDirectors = $film->directors->pluck('id')->toArray(); @endphp
                                        @foreach($directors as $director)
                                            @if(in_array($director->id, $currentDirectors))
                                                <option selected value="{{$director->id}}">{{$director->title}}</option>
                                            @else
                                                <option value="{{$director->id}}">{{$director->title}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="genres">Актеры</label>
                                    <select class="selectpicker form-control" name="actors[]" multiple
                                            data-live-search="true">
                                        @php $currentActors = $film->actors->pluck('id')->toArray(); @endphp
                                        @foreach($actors as $actor)
                                            @if(in_array($actor->id, $currentActors))
                                                <option selected value="{{$actor->id}}">{{$actor->title}}</option>
                                            @else
                                                <option value="{{$actor->id}}">{{$actor->title}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete_film" tabindex="-1" role="dialog" aria-labelledby="delete_film_title"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete_film_title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('films.destroy', $film->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
