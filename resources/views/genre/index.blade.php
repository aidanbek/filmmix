@php /** @var App\Models\Genre[] $genres */ @endphp

@extends('layouts.default')
@section('title', 'Жанры')

@section('content')
    @include('components.title_row', ['title' => 'Жанры'])
    <div class="row">
        <div class="col-md-12">
           @include('components.tables.genres_table', compact('genres'))
        </div>
    </div>
@endsection
