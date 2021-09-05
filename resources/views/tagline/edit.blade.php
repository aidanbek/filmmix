@php /** @var App\Models\Film[] $films */ @endphp
@php /** @var App\Models\Tagline $tagline */ @endphp

@extends('layouts.default')
@section('title', "Редактирование слогана")

@section('content')
    @include('components.title_row', ['title' => "Редактирование слогана"])
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('taglines.update', $tagline->id)}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="title">Текст</label>
                                <textarea name="text"
                                          id="text"
                                          class="form-control">{{$tagline->text}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="title">Оригинальный текст</label>
                                <textarea class="form-control"
                                          name="original_text"
                                          id="original_text">{{$tagline->original_text}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            @php $currentFilms = $tagline->films->pluck('id')->toArray(); @endphp
                            @include('components.selects.films', compact('films', 'currentFilms'))
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
