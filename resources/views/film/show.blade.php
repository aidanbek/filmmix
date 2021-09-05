@php /** @var App\Models\Film $film */ @endphp

@extends('layouts.default')
@section('title', "Фильмы '$film->title' ($film->prod_year)")

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

    <div class="row">
        <div class="col-sm-12">
            <h2>Слоганы</h2>
            @include('components.tables.taglines_table', ['taglines' => $film->taglines])
        </div>
    </div>

    <div class="row my-3">
        <div class="col-sm-12">
            @include('components.buttons.edit_button', ['route' => route('films.edit', $film->id)])
            @include('components.buttons.delete_button', ['modalId' => 'delete_film'])
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            @include('components.timestamps', ['element' => $film])
        </div>
    </div>

    @include('components.modals.delete_modal', [
        'modalId' => 'delete_film',
        'modalTitle' => "Удалить фильм '$film->title'",
        'route' => route('films.destroy', $film->id)
    ])

@endsection
