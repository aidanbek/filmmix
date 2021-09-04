@extends('layouts.default')
@section('title', 'Редактирование '. $profession->title)

@section('content')
    @include('components.title_row', ['title' => 'Редактирование '.$profession->title])
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('professions.update', $profession->id)}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="title">Название</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{$profession->title}}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            @php $currentUsers = $profession->users->pluck('id')->toArray(); @endphp
                            @include('components.selects.users', compact('users', 'currentUsers'))
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
