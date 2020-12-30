<?php

namespace App\Http\Controllers;

use App\Film;
use App\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::with('films')->orderBy('title')->get();
        return view('genre.index', compact('genres'));
    }

    public function create()
    {
        $films = Film::orderBy('title')->get();
        return view('genre.create', compact('films'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'films' => 'nullable|array|exists:films,id',
        ]);

        DB::transaction(function () use ($request) {
            $genre = Genre::create([
                'title' => $request->title
            ]);

            $genre->films()->attach($request->films);
        });

        return back();
    }

    public function show($id)
    {
        $genre = Genre::with('films', 'films.actors', 'films.genres', 'films.directors')
            ->findOrFail($id)
            ->first();
        $films = Film::orderBy('title')->get();
        return view('genre.show', compact('genre', 'films'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'films' => 'nullable|array|exists:films,id'
        ]);

        DB::transaction(function () use($request, $id) {
            $genre = Genre::where('id', $id)->first();
            $genre->title = $request->title;
            $genre->save();

            if (is_null($request->films)) $request->films = [];
            $genre->films()->sync($request->films);
        });

        return back();
    }

    public function destroy($id)
    {
        $genre = Genre::where('id', $id)->first();
        $genre->delete();
        return redirect(route('genres.index'));
    }
}
