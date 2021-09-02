@extends('layouts.default')
@section('title', 'Фильмы')


@section('content')
    @include('components.title_row', ['title' => 'Фильмы'])
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('films.index')}}" method="GET">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-9">
                                    <label for="title">Название</label>
                                    <input type="text"
                                           class="form-control"
                                           name="title"
                                           id="title"
                                           value="{{$request->title}}">
                                </div>
                                <div class="col-sm-3">
                                    <label for="prod_year">Год</label>
                                    <input type="number"
                                           class="form-control"
                                           name="prod_year"
                                           id="prod_year"
                                           value="{{$request->prod_year}}">
                                </div>
                            </div>
                        </div>
                        @if(count($genres) > 0)
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                        @include('components.selects.genres', compact('genres'))
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(count($directors) > 0)
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                        @include('components.selects.directors', compact('directors'))
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(count($actors) > 0)
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                        @include('components.selects.actors', compact('actors'))
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(count($countries) > 0)
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                        @include('components.selects.countries', compact('countries'))
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-outline-secondary btn-block btn-lg">Поиск</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @include('components.film_table', compact('films'))
                </div>
            </div>
        </div>
    </div>
@endsection
