@extends('layouts.default')
@section('title', $actor->title)

@section('content')
    @include('components.title_row', ['title' => $actor->title])
    <div class="row">
        <div class="col-sm-12">
            @include('components.film_table', ['films' => $actor->films])
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-12">
            <button type="button"
                    class="btn btn-outline-primary btn-sm"
                    data-toggle="modal"
                    data-target="#edit_actor">
                Редактировать
            </button>
            @if($actor->films->count() === 0)
                <button type="button"
                        class="btn btn-outline-danger btn-sm"
                        data-toggle="modal"
                        data-target="#delete_actor">Удалить
                </button>
            @endif
        </div>
    </div>

    <div class="modal fade" id="edit_actor" tabindex="-1" role="dialog" aria-labelledby="edit_actor_title"
         aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_actor_title">Редактировать</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('actors.update', $actor->id)}}" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="title">Имя</label>
                                    <input type="text"
                                           class="form-control"
                                           name="title"
                                           id="title"
                                           value="{{$actor->title}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    @php $currentFilms = $actor->films->pluck('id')->toArray(); @endphp
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

    <div class="modal fade" id="delete_actor" tabindex="-1" role="dialog" aria-labelledby="delete_actor_title"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete_actor_title">Удаление</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('actors.destroy', $actor->id)}}" method="POST">
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
