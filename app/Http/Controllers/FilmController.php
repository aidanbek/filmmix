<?php

namespace App\Http\Controllers;

use App\Http\Requests\Film\SearchFilmsRequest;
use App\Http\Requests\Film\StoreFilmRequest;
use App\Http\Requests\Film\UpdateFilmRequest;
use App\Models\Actor;
use App\Models\Country;
use App\Models\Director;
use App\Models\Film;
use App\Models\Genre;
use Illuminate\Support\Facades\DB;

class FilmController extends Controller
{
    public function index(SearchFilmsRequest $request)
    {
        $films = Film::with('actors')
            ->with('genres')
            ->with('directors')
            ->with('countries')
            ->when($request->title, function ($query) use ($request) {
                return $query->where('title', $request->title);
            })
            ->when($request->prod_year, function ($query) use ($request) {
                return $query->where('prod_year', $request->prod_year);
            })
            ->when($request->actors, function ($query) use ($request) {
                return $query->whereHas('actors', function ($query) use ($request) {
                    $query->whereIn('users.id', $request->actors);
                });
            })
            ->when($request->directors, function ($query) use ($request) {
                return $query->whereHas('directors', function ($query) use ($request) {
                    $query->whereIn('users.id', $request->directors);
                });
            })
            ->when($request->genres, function ($query) use ($request) {
                return $query->whereHas('genres', function ($query) use ($request) {
                    $query->whereIn('genres.id', $request->genres);
                });
            })
            ->when($request->countries, function ($query) use ($request) {
                return $query->whereHas('countries', function ($query) use ($request) {
                    $query->whereIn('countries.id', $request->countries);
                });
            })
            ->orderBy('title')
            ->orderBy('prod_year')
            ->get();

        $actors = Actor::ordered()->get();
        $directors = Director::ordered()->get();
        $genres = Genre::ordered()->get();
        $countries = Country::ordered()->get();
        $currentActors = $request->actors;
        $currentDirectors = $request->directors;
        $currentGenres = $request->genres;
        $currentCountries = $request->countries;

        return view('film.index', compact(
            'films',
            'request',
            'actors',
            'directors',
            'genres',
            'countries',
            'currentActors',
            'currentDirectors',
            'currentGenres',
            'currentCountries'
        ));
    }

    public function create()
    {
        $actors = Actor::ordered()->get();
        $directors = Director::ordered()->get();
        $genres = Genre::ordered()->get();
        $countries = Country::ordered()->get();

        return view('film.create', compact('actors', 'directors', 'genres', 'countries'));
    }

    public function store(StoreFilmRequest $request)
    {
        DB::transaction(function () use ($request) {
            $film = new Film();
            $film->title = $request->title;
            $film->prod_year = $request->prod_year;
            $film->save();

            $film->actors()->attach($request->actors);
            $film->directors()->attach($request->directors);
            $film->genres()->attach($request->genres);
            $film->countries()->attach($request->countries);
        });

        return back();
    }

    public function show($id)
    {
        $film = Film::with('actors')
            ->with('directors')
            ->with('genres')
            ->with('countries')
            ->findOrFail($id);
        $actors = Actor::ordered()->get();
        $directors = Director::ordered()->get();
        $genres = Genre::ordered()->get();
        $countries = Country::ordered()->get();

        return view('film.show', compact('film', 'actors', 'directors', 'genres', 'countries'));
    }

    public function update(UpdateFilmRequest $request, $id)
    {
        DB::transaction(function () use ($request, $id) {
            $film = Film::findOrFail($id);
            $film->title = $request->title;
            $film->prod_year = $request->prod_year;
            $film->save();

            $film->actors()->sync($request->actors);
            $film->directors()->sync($request->directors);
            $film->genres()->sync($request->genres);
            $film->countries()->sync($request->countries);
        });

        return back();
    }

    public function destroy($id)
    {
        $film = Film::findOrFail($id);
        DB::transaction(function () use ($film) {
            $film->genres()->detach();
            $film->actors()->detach();
            $film->directors()->detach();
            $film->countries()->detach();
            $film->delete();
        });
        return redirect(route('films.index'));
    }
}
