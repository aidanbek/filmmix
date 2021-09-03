@extends('layouts.default')
@section('title', 'Люди')

@section('content')
    @include('components.title_row', ['title' => 'Люди'])
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover table-bordered datatable-table">
                <thead>
                <tr>
                    <th>ФИО</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td> @include('components.links.user_link', compact('user'))</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
