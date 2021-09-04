<?php

namespace App\Http\Controllers;

use App\Http\Requests\Film\SearchFilmsRequest;
use App\Http\Requests\Film\StoreFilmRequest;
use App\Http\Requests\Film\UpdateFilmRequest;
use App\Models\Country;
use App\Models\Film;
use App\Models\Genre;
use Illuminate\Support\Facades\DB;

class FilmController extends Controller
{
    public function index(SearchFilmsRequest $request)
    {
        $films = Film::with('genres')
            ->with('countries')
            ->when($request->title, function ($query) use ($request) {
                return $query->where('title', $request->title);
            })
            ->when($request->prod_year, function ($query) use ($request) {
                return $query->where('prod_year', $request->prod_year);
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

        $genres = Genre::ordered()->get();
        $countries = Country::ordered()->get();
        $currentGenres = $request->genres;
        $currentCountries = $request->countries;

        return view('film.index', compact(
            'films',
            'request',
            'genres',
            'countries',
            'currentGenres',
            'currentCountries'
        ));
    }

    public function create()
    {
        $genres = Genre::ordered()->get();
        $countries = Country::ordered()->get();

        return view('film.create', compact('genres', 'countries'));
    }

    public function store(StoreFilmRequest $request)
    {
        DB::transaction(function () use ($request) {
            $film = new Film();
            $film->title = $request->title;
            $film->prod_year = $request->prod_year;
            $film->save();

            $film->genres()->attach($request->genres);
            $film->countries()->attach($request->countries);
        });

        return back();
    }

    public function show(Film $film)
    {
        $film->load('genres', 'countries');

        return view('film.show', compact('film'));
    }

    public function edit(Film $film)
    {
        $film->load('genres', 'countries');
        $genres = Genre::ordered()->get();
        $countries = Country::ordered()->get();

        return view('film.edit', compact('film', 'genres', 'countries'));
    }

    public function update(UpdateFilmRequest $request, Film $film)
    {
        DB::transaction(function () use ($request, $film) {
            $film->title = $request->title;
            $film->prod_year = $request->prod_year;
            $film->save();

            $film->genres()->sync($request->genres);
            $film->countries()->sync($request->countries);
        });

        return redirect(route('films.show', $film->id));
    }

    public function destroy(Film $film)
    {
        DB::transaction(function () use ($film) {
            $film->genres()->detach();
            $film->countries()->detach();
            $film->delete();
        });

        return redirect(route('films.index'));
    }
}
