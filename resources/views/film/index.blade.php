@extends('layouts.default')
@section('title', 'Фильмы')


@section('content')
    @include('components.title_row', ['title' => 'Фильмы'])
    <div class="row">
        <div class="col-md-12">
            @include('components.film_table', compact('films'))
        </div>
    </div>
@endsection
