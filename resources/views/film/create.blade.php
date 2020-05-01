@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('films.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-9">
                            <label for="title">Название</label>
                            <input type="text" class="form-control" name="title" id="title">
                        </div>
                        <div class="col-sm-3">
                            <label for="prod_year">Год</label>
                            <input type="number" class="form-control" name="prod_year" id="prod_year">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            <select class="selectpicker form-control" name="directors[]" multiple data-live-search="true">
                                @foreach($directors as $director)
                                    <option value="{{$director->id}}">{{$director->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            <select class="selectpicker form-control" name="actors[]" multiple data-live-search="true">
                                @foreach($actors as $actor)
                                    <option value="{{$actor->id}}">{{$actor->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>
    </div>
@endsection
