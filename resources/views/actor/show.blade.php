@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1>{{$actor->title}}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            @include('components.film_table', ['films' => $actor->films])
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-12">
            @if($actor->films->count() === 0)
                <button type="button"
                        class="btn btn-outline-danger btn-sm"
                        data-toggle="modal"
                        data-target="#delete_actor">Удалить
                </button>
            @endif
        </div>
    </div>

    <div class="modal fade" id="delete_actor" tabindex="-1" role="dialog" aria-labelledby="delete_actor_title"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete_actor_title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('actors.destroy', $actor->id)}}" method="POST">
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
