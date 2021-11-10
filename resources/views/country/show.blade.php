@php /** @var App\Models\Country $country */ @endphp

@extends('layouts.default')
@section('title', "Страна '$country->title'")

@section('content')
    @include('components.title_row', ['title' =>  "Страна '$country->title'"])
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Фильмы</h4>
                    @include('components.tables.film_table', ['films' => $country->films])
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
            @include('components.buttons.edit_button', ['route' => route('countries.edit', $country->id)])
            @include('components.buttons.delete_button', ['modalId' => 'delete_country'])
        </div>
    </div>

    @include('components.modals.delete_modal', [
        'modalId' => 'delete_country',
        'modalTitle' => "Удалить страну '$country->title'",
        'route' => route('countries.destroy', $country->id)
    ])
@endsection
