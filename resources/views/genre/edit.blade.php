@php /** @var App\Models\Film[] $films */ @endphp
@php /** @var App\Models\Genre $genre */ @endphp

@extends('layouts.default')
@section('title', "Редактирование жанра '$genre->title'")

@section('content')
    @include('components.title_row', ['title' => "Редактирование жанра '$genre->title'"])
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('genres.update', $genre->id)}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="title">Название</label>
                            <input type="text"
                                   class="form-control"
                                   name="title"
                                   id="title"
                                   value="{{$genre->title}}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            @php $currentFilms = $genre->films->pluck('id')->toArray(); @endphp
                            @include('components.selects.films', compact('films', 'currentFilms'))
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
