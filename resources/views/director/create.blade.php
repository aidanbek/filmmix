@extends('layouts.default')
@section('title', 'Добавить режиссера')

@section('content')
    @include('components.title_row', ['title' => 'Добавить режиссера'])
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('directors.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-9">
                            <label for="title">Имя</label>
                            <input type="text"
                                   class="form-control"
                                   name="title"
                                   id="title">
                        </div>
                        <div class="col-sm-3">
                            <label for="birth_date">Дата рождения</label>
                            <input type="date"
                                   class="form-control"
                                   name="birth_date"
                                   id="birth_date">
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
