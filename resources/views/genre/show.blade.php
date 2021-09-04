@extends('layouts.default')
@section('title', "Жанр '$genre->title'")

@section('content')
    @include('components.title_row', ['title' => "Жанр '$genre->title'"])
    <div class="row">
        <div class="col-sm-12">
            @include('components.tables.film_table', ['films' => $genre->films])
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-12">
            @include('components.buttons.edit_button', ['route' => route('genres.edit', $genre->id)])
            @include('components.buttons.delete_button', ['modalId' => 'delete_genre'])
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            @include('components.timestamps', ['element' => $genre])
        </div>
    </div>

    @include('components.modals.delete_modal', [
        'modalId' => 'delete_genre',
        'modalTitle' => "Удалить жанр '$genre->title'",
        'route' => route('genres.destroy', $genre->id)
    ])
@endsection
