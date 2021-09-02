@extends('layouts.default')
@section('title', 'Добавить страну')

@section('content')
    @include('components.title_row', ['title' => 'Добавить страну'])
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('countries.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-8">
                            <label for="title">Название</label>
                            <input type="text" class="form-control" name="title" id="title">
                        </div>
                        <div class="col-sm-4">
                            <label for="title">Код страны</label>
                            <input type="text" class="form-control" name="code" id="code">
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
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            @include('components.selects.users', compact('users'))
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>
    </div>
@endsection
