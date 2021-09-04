@extends('layouts.default')
@section('title', "Редактированиеа фильм '$film->title' ($film->prod_year)")

@section('content')
    @include('components.title_row', ['title' => "Редактирование фильма '$film->title' ($film->prod_year)"])
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('films.update', $film->id)}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-9">
                            <label for="title">Название</label>
                            <input type="text"
                                   class="form-control"
                                   name="title"
                                   id="title"
                                   value="{{$film->title}}">
                        </div>
                        <div class="col-sm-3">
                            <label for="prod_year">Год</label>
                            <input type="number"
                                   class="form-control"
                                   name="prod_year"
                                   id="prod_year"
                                   value="{{$film->prod_year}}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            @php $currentGenres = $film->genres->pluck('id')->toArray(); @endphp
                            @include('components.selects.genres', compact('genres', 'currentGenres'))
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            @php $currentCountries = $film->countries->pluck('id')->toArray(); @endphp
                            @include('components.selects.countries', compact('countries', 'currentCountries'))
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
