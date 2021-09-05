@php /** @var App\Models\Tagline[] $taglines */ @endphp

@extends('layouts.default')
@section('title', 'Слоганы')

@section('content')
    @include('components.title_row', ['title' => 'Слоганы'])
    <div class="row">
        <div class="col-md-12">
            @include('components.tables.taglines_table', compact('taglines'))
        </div>
    </div>
@endsection
