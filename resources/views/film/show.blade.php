@extends('layouts.default')
@section('title', $film->title.' ('.$film->prod_year.')')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="jumbotron jumbotron-fluid bg-light">
                <div class="container text-center">
                    <h1 class="display-4">{{$film->title}}</h1>
                    @if(!is_null($film->prod_year))
                        <a href="{{route('films.index', ['prod_year' => $film->prod_year])}}"
                           class="badge badge-primary">
                            {{$film->prod_year}}
                        </a>
                    @endif
                    @foreach($film->genres as $genre)
                        <a href="{{route('genres.show', $genre->id)}}" class="badge badge-primary">
                            {{$genre->title}}
                        </a>
                    @endforeach
                </div>
            </div>
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
            @if(true)
                <button type="button"
                        class="btn btn-outline-danger btn-sm"
                        data-toggle="modal"
                        data-target="#delete_film">Удалить
                </button>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            @include('components.timestamps', ['element' => $film])
        </div>
    </div>

    <div class="modal fade" id="edit_film" tabindex="-1" role="dialog" aria-labelledby="edit_film_title"
         aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_film_title">Редактировать</h5>
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
                                    @php $currentGenres = $film->genres->pluck('id')->toArray(); @endphp
                                    @include('components.selects.genres', compact('genres', 'currentGenres'))
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    @php $currentCountries = $film->countries->pluck('id')->toArray(); @endphp
                                    @include('components.selects.countries', compact('countries', 'currentCountries'))
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

    @include('components.modals.delete_modal', [
        'modalId' => 'delete_film',
        'modalTitle' => "Удалить фильм '$film->title'",
        'route' => route('films.destroy', $film->id)
    ])

@endsection
