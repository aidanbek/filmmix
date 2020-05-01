@extends('layouts.default')

@section('content')
    <div class="row mb-3">
        <div class="col-sm-12">
            <h1>{{$genre->title}}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            @include('components.film_table', ['films' => $genre->films])
        </div>
    </div>
@endsection
