@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('actors.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="title">Имя</label>
                            <input type="text" class="form-control" name="title" id="title">
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
