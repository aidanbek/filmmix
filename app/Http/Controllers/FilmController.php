<?php

namespace App\Http\Controllers;

use App\Actor;
use App\Director;
use App\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::with('actors', 'directors')->orderBy('title')->get();
        return view('film.index', compact('films'));
    }

    public function create()
    {
        $actors = Actor::orderBy('title')->get();
        $directors = Director::orderBy('title')->orderBy('prod_year')->get();
        return view('film.create', compact('actors', 'directors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'prod_year' => 'required|integer|min:1800|max:3000',
            'actors' => 'nullable|array|exists:users,id',
            'directors' => 'nullable|array|exists:users,id'
        ]);

        $film = Film::create([
            'title' => $request->title,
            'prod_year' => $request->prod_year,
        ]);

        $film->actors()->attach($request->actors);
        $film->directors()->attach($request->directors);

        return back();
    }

    public function show($id)
    {
        $film = Film::find($id)->first();
        dd($film);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
