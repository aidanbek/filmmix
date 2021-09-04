@extends('layouts.default')
@section('title', 'Люди')

@section('content')
    @include('components.title_row', ['title' => 'Люди'])
    <div class="row">
        <div class="col-md-12">
            @include('components.tables.users_table', compact('users'))
        </div>
    </div>
@endsection
