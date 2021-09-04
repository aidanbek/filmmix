@extends('layouts.default')
@section('title', $profession->title)

@section('content')
    @include('components.title_row', ['title' => $profession->title])
    <div class="row mb-3">
        <div class="col-sm-12">
            <a type="button"
               class="btn btn-outline-primary btn-sm"
               href="{{route('professions.edit', $profession->id)}}">
                Редактировать
            </a>
            @if(true)
                <button type="button"
                        class="btn btn-outline-danger btn-sm"
                        data-toggle="modal"
                        data-target="#delete_profession">Удалить
                </button>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            @include('components.users_table', ['users' => $profession->users])
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            @include('components.timestamps', ['element' => $profession])
        </div>
    </div>

    @include('components.modals.delete_modal', [
        'modalId' => 'delete_profession',
        'modalTitle' => "Удалить профессию '$profession->title'",
        'route' => route('professions.destroy', $profession->id)
    ])
@endsection
