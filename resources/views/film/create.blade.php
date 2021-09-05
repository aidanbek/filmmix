@php /** @var App\Models\Genre[] $genres */ @endphp
@php /** @var App\Models\Country[] $countries */ @endphp

@extends('layouts.default')
@section('title', 'Добавить фильм')

@section('content')
    @include('components.title_row', ['title' => 'Добавить фильм'])
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('films.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-9">
                            <label for="title">Название</label>
                            <input type="text" class="form-control" name="title" id="title">
                        </div>
                        <div class="col-sm-3">
                            <label for="prod_year">Год</label>
                            <input type="number" class="form-control" name="prod_year" id="prod_year">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            @include('components.selects.genres', compact('genres'))
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            @include('components.selects.countries', compact('countries'))
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>
    </div>
@endsection
