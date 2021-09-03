@extends('layouts.default')
@section('title', $country->title)

@section('content')
    @include('components.title_row', ['title' => $country->title])
    <div class="row">
        <div class="col-sm-12">
            <form>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="">Код страны</label>
                            <input type="text"
                                   class="form-control-plaintext"
                                   readonly
                                   value="{{$country->code}}">
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
                    <h4 class="card-title">Фильмы</h4>
                    @include('components.film_table', ['films' => $country->films])
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-sm-12">
            <b>Люди:</b>
            @foreach($country->users as $user)
                @include('components.links.user_link', compact('user'))
            @endforeach
        </div>
    </div>

    <div class="row my-3">
        <div class="col-sm-12">
            <button type="button"
                    class="btn btn-outline-primary btn-sm"
                    data-toggle="modal"
                    data-target="#edit_country">
                Редактировать
            </button>
            @if($country->films->count() === 0)
                <button type="button"
                        class="btn btn-outline-danger btn-sm"
                        data-toggle="modal"
                        data-target="#delete_country">Удалить
                </button>
            @endif
        </div>
    </div>



    <div class="modal fade" id="edit_country" tabindex="-1" role="dialog" aria-labelledby="edit_country_title"
         aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_country_title">Редактировать</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('countries.update', $country->id)}}" method="POST">
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
                                           value="{{$country->title}}">
                                </div>
                                <div class="col-sm-3">
                                    <label for="birth_date">Код страны</label>
                                    <input type="text"
                                           class="form-control"
                                           name="code"
                                           id="code"
                                           value="{{$country->code}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    @php $currentFilms = $country->films->pluck('id')->toArray(); @endphp
                                    @include('components.selects.films', compact('films', 'currentFilms'))
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    @php $currentUsers = $country->users->pluck('id')->toArray(); @endphp
                                    @include('components.selects.users', compact('users', 'currentUsers'))
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

    <div class="modal fade" id="delete_country" tabindex="-1" role="dialog" aria-labelledby="delete_country_title"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete_country_title">Удаление</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('countries.destroy', $country->id)}}" method="POST">
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
