<?php

namespace App\Http\Controllers;

use App\Actor;
use App\Director;
use App\Film;
use App\FilmActor;
use App\FilmDirector;
use App\FilmGenre;
use App\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilmController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'prod_year' => 'nullable|integer|min:1800|max:3000',
            'actors' => 'nullable|array|exists:users,id',
            'directors' => 'nullable|array|exists:users,id',
            'genres' => 'nullable|array|exists:genres,id'
        ]);

        $films = Film::with('actors', 'directors', 'genres')
            ->when(!is_null($request->title), function ($query) use ($request) {
                return $query->where('title', $request->title);
            })
            ->when(!is_null($request->prod_year), function ($query) use ($request) {
                return $query->where('prod_year', $request->prod_year);
            })
            ->when(!is_null($request->actors), function ($query) use ($request) {
                $filmsId = FilmActor::select('film_id')
                    ->distinct()
                    ->whereIn('actor_id', $request->actors);
                return $query->whereIn('id', $filmsId);
            })
            ->when(!is_null($request->directors), function ($query) use ($request) {
                $directorsId = FilmDirector::select('film_id')
                    ->distinct()
                    ->whereIn('director_id', $request->directors);
                return $query->whereIn('id', $directorsId);
            })
            ->when(!is_null($request->genres), function ($query) use ($request) {
                $genresId = FilmGenre::select('film_id')
                    ->distinct()
                    ->whereIn('genre_id', $request->genres);
                return $query->whereIn('id', $genresId);
            })
            ->orderBy('title')
            ->orderBy('prod_year')
            ->get();

        $actors = Actor::orderBy('title')->get();
        $directors = Director::orderBy('title')->get();
        $genres = Genre::orderBy('title')->get();
        $currentActors = $request->actors;
        $currentDirectors = $request->directors;
        $currentGenres = $request->genres;

        return view('film.index', compact(
            'films',
            'request',
            'actors',
            'directors',
            'genres',
            'currentActors',
            'currentDirectors',
            'currentGenres'
        ));
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
        $film = Film::with('actors', 'directors', 'genres')->findOrFail($id)->first();
        return view('film.show', compact('film', 'actors', 'directors', 'genres'));
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
