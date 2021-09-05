@php /** @var App\Models\Film[] $films */ @endphp

@extends('layouts.default')
@section('title', 'Добавить слоган')

@section('content')
    @include('components.title_row', ['title' => 'Добавить слоган'])
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('taglines.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="title">Текст</label>
                            <textarea name="text"
                                      id="text"
                                      class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="title">Оригинальный текст</label>
                            <textarea class="form-control"
                                      name="original_text"
                                      id="original_text"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            @include('components.selects.films', compact('films'))
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>
    </div>
@endsection
