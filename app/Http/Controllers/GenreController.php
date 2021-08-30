<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::with('films')
            ->ordered()
            ->get();
        return view('genre.index', compact('genres'));
    }

    public function create()
    {
        $films = Film::ordered()->get();
        return view('genre.create', compact('films'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'films' => ['nullable', 'array', 'exists:films,id'],
        ]);

        DB::transaction(function () use ($request) {
            $genre = new Genre();
            $genre->title = $request->title;
            $genre->save();

            $genre->films()->attach($request->films);
        });

        return back();
    }

    public function show($id)
    {
        $genre = Genre::with('films', 'films.actors', 'films.genres', 'films.directors')
            ->findOrFail($id);
        $films = Film::ordered()->get();
        return view('genre.show', compact('genre', 'films'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'films' => ['nullable', 'array', 'exists:films,id']
        ]);

        DB::transaction(function () use ($request, $id) {
            $genre = Genre::findOrFail($id);
            $genre->title = $request->title;
            $genre->save();
            $genre->films()->sync($request->films ?? []);
        });

        return back();
    }

    public function destroy($id)
    {
        Genre::findOrFail($id)->delete();
        return redirect(route('genres.index'));
    }
}
