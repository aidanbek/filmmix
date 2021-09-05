@php /** @var App\Models\User $user */ @endphp

@extends('layouts.default')
@section('title', $user->title)

@section('content')
    @include('components.title_row', ['title' => $user->title])
    <div class="row mb-3">
        <div class="col-sm-12">
            @include('components.buttons.edit_button', ['route' => route('users.edit', $user->id)])
            @include('components.buttons.delete_button', ['modalId' => 'delete_user'])
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            @include('components.tables.professions_table', ['professions' => $user->professions])
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            @include('components.timestamps', ['element' => $user])
        </div>
    </div>

    @include('components.modals.delete_modal', [
        'modalId' => 'delete_user',
        'modalTitle' => "Удалить человека '$user->title'",
        'route' => route('users.destroy', $user->id)
    ])
@endsection
