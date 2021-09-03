@extends('layouts.default')
@section('title', 'Добавить профессию')

@section('content')
    @include('components.title_row', ['title' => 'Добавить профессию'])
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('professions.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="title">Название</label>
                            <input type="text" class="form-control" name="title" id="title">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>
    </div>
@endsection
