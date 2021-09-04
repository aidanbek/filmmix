@extends('layouts.default')
@section('title', 'Редактирование '. $user->title)

@section('content')
    @include('components.title_row', ['title' => 'Редактирование '.$user->title])
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('users.update', $user->id)}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="title">ФИО</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{$user->title}}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            @php $currentProfessions = $user->professions->pluck('id')->toArray(); @endphp
                            @include('components.selects.professions', compact('professions', 'currentProfessions'))
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
