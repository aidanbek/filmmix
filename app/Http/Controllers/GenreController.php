<?php

namespace App\Http\Controllers;

use App\Http\Requests\Genre\StoreGenreRequest;
use App\Http\Requests\Genre\UpdateGenreRequest;
use App\Models\Film;
use App\Models\Genre;
use Illuminate\Support\Facades\DB;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::withCount('films')->ordered()->get();

        return view('genre.index', compact('genres'));
    }

    public function create()
    {
        $films = Film::ordered()->get();

        return view('genre.create', compact('films'));
    }

    public function store(StoreGenreRequest $request)
    {
        DB::transaction(function () use ($request) {
            $genre = new Genre();
            $genre->title = $request->title;
            $genre->save();

            $genre->films()->attach($request->films);
        });

        return back();
    }

    public function show(Genre $genre)
    {
        $genre->load('films.genres', 'films.countries');

        return view('genre.show', compact('genre'));
    }

    public function edit(Genre $genre)
    {
        $genre->load('films.genres', 'films.countries');
        $films = Film::ordered()->get();

        return view('genre.edit', compact('genre', 'films'));
    }

    public function update(UpdateGenreRequest $request, Genre $genre)
    {
        DB::transaction(function () use ($request, $genre) {
            $genre->title = $request->title;
            $genre->save();
            $genre->films()->sync($request->films);
        });

        return redirect(route('genres.show', $genre->id));
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect(route('genres.index'));
    }
}
