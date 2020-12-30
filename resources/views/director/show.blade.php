@extends('layouts.default')
@section('title', $director->title)


@section('content')
    @include('components.title_row', ['title' => $director->title])
    <div class="row">
        <div class="col-sm-12">
            <form>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="">Дата рождения</label>
                            <input type="date"
                                   class="form-control-plaintext"
                                   readonly
                                   value="{{$director->birth_date}}">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Фильмография</h4>
                    @include('components.film_table', ['films' => $director->films])
                </div>
            </div>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-sm-12">
            <button type="button"
                    class="btn btn-outline-primary btn-sm"
                    data-toggle="modal"
                    data-target="#edit_director">
                Редактировать
            </button>
            @if($director->films->count() === 0)
                <button type="button"
                        class="btn btn-outline-danger btn-sm"
                        data-toggle="modal"
                        data-target="#delete_director">Удалить
                </button>
            @endif
        </div>
    </div>

    <div class="modal fade" id="edit_director" tabindex="-1" role="dialog" aria-labelledby="edit_director_title"
         aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_director_title">Редактировать</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('directors.update', $director->id)}}" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-9">
                                    <label for="title">Имя</label>
                                    <input type="text"
                                           class="form-control"
                                           name="title"
                                           id="title"
                                           value="{{$director->title}}">
                                </div>
                                <div class="col-sm-3">
                                    <label for="birth_date">Дата рождения</label>
                                    <input type="date"
                                           class="form-control"
                                           name="birth_date"
                                           id="birth_date"
                                           value="{{$director->birth_date}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    @php $currentFilms = $director->films->pluck('id')->toArray(); @endphp
                                    @include('components.selects.films', compact('films', 'currentFilms'))
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

    <div class="modal fade" id="delete_director" tabindex="-1" role="dialog" aria-labelledby="delete_director_title"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete_director_title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('directors.destroy', $director->id)}}" method="POST">
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
