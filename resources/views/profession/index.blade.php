@php /** @var App\Models\Profession[] $professions */ @endphp

@extends('layouts.default')
@section('title', 'Профессии')

@section('content')
    @include('components.title_row', ['title' => 'Профессии'])
    <div class="row">
        <div class="col-md-12">
            @include('components.tables.professions_table', compact('professions'))
        </div>
    </div>
@endsection
