@extends('layouts.default')
@section('title', "Профессия '$profession->title'")

@section('content')
    @include('components.title_row', ['title' => "Профессия '$profession->title'"])
    <div class="row mb-3">
        <div class="col-sm-12">
            @include('components.buttons.edit_button', ['route' => route('professions.edit', $profession->id)])
            @include('components.buttons.delete_button', ['modalId' => 'delete_profession'])
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            @include('components.tables.users_table', ['users' => $profession->users])
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
