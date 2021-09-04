@extends('layouts.default')
@section('title', 'Добавить человека')

@section('content')
    @include('components.title_row', ['title' => 'Добавить человека'])
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('users.store')}}" method="POST">
                @csrf
                @method('POST')
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="title">ФИО</label>
                            <input type="text" class="form-control" name="title" id="title">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            @include('components.selects.professions', compact('professions'))
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>
    </div>
@endsection
