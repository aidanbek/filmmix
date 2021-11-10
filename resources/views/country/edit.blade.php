@php /** @var App\Models\Country $country */ @endphp

@extends('layouts.default')
@section('title', "Редактирование страны '$country->title'")

@section('content')
    @include('components.title_row', ['title' => "Редактирование страны '$country->title'"])
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('countries.update', $country->id)}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="title">Название страны</label>
                            <input type="text"
                                   class="form-control"
                                   name="title"
                                   id="title"
                                   value="{{$country->title}}">
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            @php $currentFilms = $country->films->pluck('id')->toArray(); @endphp
                            @include('components.selects.films', compact('films', 'currentFilms'))
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            @php $currentUsers = $country->users->pluck('id')->toArray(); @endphp
                            @include('components.selects.users', compact('users', 'currentUsers'))
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
