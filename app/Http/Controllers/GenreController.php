<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::with('films')->orderBy('title')->get();
        return view('genre.index', compact('genres'));
    }

    public function create()
    {
        return view('genre.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required'
        ]);

        Genre::create([
            'title' => $request->title
        ]);

        return back();
    }

    public function show($id)
    {
        $genre = Genre::with('films', 'films.actors', 'films.genres', 'films.directors')
            ->where('id', $id)
            ->first();
        return view('genre.show', compact('genre'));
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
