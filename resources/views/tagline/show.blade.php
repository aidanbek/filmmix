@php /** @var App\Models\Tagline $tagline */ @endphp

@extends('layouts.default')
@section('title', "Слоган")

@section('content')
    @include('components.title_row', ['title' =>  "Слоган"])
    <div class="row">
        <div class="col-sm-12">
            <form>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="">Текст</label>
                            <textarea class="form-control" readonly>{{$tagline->text}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="">Оригинальный текст</label>
                            <textarea class="form-control" readonly>{{$tagline->original_text}}</textarea>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Фильмы</h4>
                    @include('components.tables.film_table', ['films' => $tagline->films])
                </div>
            </div>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-sm-12">
            @include('components.buttons.edit_button', ['route' => route('taglines.edit', $tagline->id)])
            @include('components.buttons.delete_button', ['modalId' => 'delete_tagline'])
        </div>
    </div>

    @include('components.modals.delete_modal', [
        'modalId' => 'delete_tagline',
        'modalTitle' => "Удалить слоган",
        'route' => route('taglines.destroy', $tagline->id)
    ])
@endsection
