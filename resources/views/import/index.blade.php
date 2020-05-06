@extends('layouts.default')
@section('title', 'Импорт')

@section('content')
    @include('components.title_row', ['title' => 'Импорт'])
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('imports.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            <select name="import_type" class="form-control" id="import_type">
                                <option value="actor_import">Импорт актеров</option>
                                <option value="film_import">Импорт фильмов</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            <textarea name="import_data" class="form-control" id="import_data" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>
    </div>
@endsection
