@extends('layouts.default')

@section('content')
    <div class="row mb-3">
        <div class="col-sm-12">
            <h1>{{$director->title}}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            @include('components.film_table', ['films' => $director->films])
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-12">
            @if($director->films->count() === 0)
                <button type="button"
                        class="btn btn-outline-danger btn-sm"
                        data-toggle="modal"
                        data-target="#delete_director">Удалить
                </button>
            @endif
        </div>
    </div>

    <div class="modal fade" id="delete_director" tabindex="-1" role="dialog" aria-labelledby="delete_director_title"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete_director_title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('directors.destroy', $director->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
