@php /** @var App\Models\Film $film */ @endphp

@extends('layouts.default')
@section('title', "Фильмы '$film->title' ($film->prod_year)")

@section('content')
    <div class="row">
        <div class="col-sm-3">
            <div class="jumbotron jumbotron-fluid bg-light">
                <div class="container text-center">
                    <h1 class="display-4">{{$film->title}}</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-9">
            <table class="table table-sm table-bordered table-hover">
                <tbody>
                <tr>
                    <td>Год выпуска</td>
                    <td>{{ $film->prod_year }}</td>
                </tr>
                @if($film->countries()->count() > 0)
                    <tr>
                        <td>Страны производства</td>
                        <td>
                            @foreach($film->countries as $country)
                                @include('components.link', [
                                    'loop' => $loop,
                                    'href' => route('countries.show', $country->id),
                                    'title' => $country->title
                                ])
                            @endforeach
                        </td>
                    </tr>
                @endif
                @if($film->genres()->count() > 0)
                    <tr>
                        <td>Жанр</td>
                        <td>
                            @foreach($film->genres as $genre)
                                @include('components.link', [
                                    'loop' => $loop,
                                    'href' => route('genres.show', $genre->id),
                                    'title' => $genre->title
                                ])
                            @endforeach
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
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
