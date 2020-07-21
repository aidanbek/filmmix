<?php

namespace App\Http\Controllers;

use App\Actor;
use App\Director;
use App\Film;
use App\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::with('actors', 'directors', 'genres')->orderBy('title')->orderBy('prod_year')->get();
        return view('film.index', compact('films'));
    }

    public function create()
    {
        $actors = Actor::orderBy('title')->get();
        $directors = Director::orderBy('title')->get();
        $genres = Genre::orderBy('title')->get();
        return view('film.create', compact('actors', 'directors', 'genres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'prod_year' => 'required|integer|min:1800|max:3000',
            'actors' => 'nullable|array|exists:users,id',
            'directors' => 'nullable|array|exists:users,id',
            'genres' => 'nullable|array|exists:genres,id'
        ]);

        DB::transaction(function () use ($request) {
            $film = Film::create([
                'title' => $request->title,
                'prod_year' => $request->prod_year,
            ]);

            $film->actors()->attach($request->actors);
            $film->directors()->attach($request->directors);
            $film->genres()->attach($request->genres);
        });

        return back();
    }

    public function show($id)
    {
        $actors = Actor::orderBy('title')->get();
        $directors = Director::orderBy('title')->get();
        $genres = Genre::orderBy('title')->get();
        $film = Film::with('actors', 'directors', 'genres')->where('id', $id)->first();
        return view('film.show', compact('film', 'actors', 'directors', 'genres'));
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'prod_year' => 'required|integer|min:1800|max:3000',
            'actors' => 'nullable|array|exists:users,id',
            'directors' => 'nullable|array|exists:users,id',
            'genres' => 'nullable|array|exists:genres,id'
        ]);

        DB::transaction(function () use ($request, $id) {
            $film = Film::where('id', $id)->first();
            $film->title = $request->title;
            $film->prod_year = $request->prod_year;
            $film->save();

            if (is_null($request->actors)) $request->actors = [];
            if (is_null($request->directors)) $request->directors = [];
            if (is_null($request->genres)) $request->genres = [];

            $film->actors()->sync($request->actors);
            $film->directors()->sync($request->directors);
            $film->genres()->sync($request->genres);
        });

        return back();
    }

    public function destroy($id)
    {
        $film = Film::where('id', $id)->first();
        DB::transaction(function () use ($film) {
            $film->genres()->detach();
            $film->actors()->detach();
            $film->directors()->detach();
            $film->delete();
        });
        return redirect(route('films.index'));
    }
}
