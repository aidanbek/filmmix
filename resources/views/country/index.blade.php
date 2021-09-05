@php /** @var App\Models\Country[] $countries */ @endphp

@extends('layouts.default')
@section('title', 'Страны')

@section('content')
    @include('components.title_row', ['title' => 'Страны'])
    <div class="row">
        <div class="col-md-12">
            @include('components.tables.countries_table', compact('countries'))
        </div>
    </div>
@endsection
