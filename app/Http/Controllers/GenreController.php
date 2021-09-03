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
        $genres = Genre::withCount('films')
            ->ordered()
            ->get();
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

    public function show($id)
    {
        $genre = Genre::with('films.genres')
            ->with('films.countries')
            ->findOrFail($id);
        $films = Film::ordered()->get();
        return view('genre.show', compact('genre', 'films'));
    }

    public function update(UpdateGenreRequest $request, $id)
    {
        DB::transaction(function () use ($request, $id) {
            $genre = Genre::findOrFail($id);
            $genre->title = $request->title;
            $genre->save();
            $genre->films()->sync($request->films);
        });

        return back();
    }

    public function destroy($id)
    {
        Genre::findOrFail($id)->delete();
        return redirect(route('genres.index'));
    }
}
