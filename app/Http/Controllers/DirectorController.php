<?php

namespace App\Http\Controllers;

use App\Director;
use App\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DirectorController extends Controller
{
    public function index()
    {
        $directors = Director::orderBy('title')->get();
        return view('director.index', compact('directors'));
    }

    public function create()
    {
        $films = Film::orderBy('title')->get();
        return view('director.create', compact('films'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'films' => 'nullable|array|exists:films,id',
            'birth_date' => 'nullable|date'
        ]);

        DB::transaction(function () use ($request) {
            $director = Director::create([
                'title' => $request->title,
                'birth_date' => $request->birth_date
            ]);

            $director->films()->attach($request->films);
        });

        return back();
    }

    public function show($id)
    {
        $director = Director::with('films', 'films.actors', 'films.genres', 'films.directors')
            ->findOrFail($id);
        $films = Film::orderBy('title')->get();
        return view('director.show', compact('director', 'films'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'films' => 'nullable|array|exists:films,id',
            'birth_date' => 'nullable|date'
        ]);

        DB::transaction(function () use ($request, $id) {
            Director::findOrFail($id)->update([
                'title' => $request->title,
                'birth_date' => $request->birth_date
            ]);

            $director = Director::findOrFail($id);

            if (is_null($request->films)) $request->films = [];
            $director->films()->sync($request->films);
        });

        return back();
    }

    public function destroy($id)
    {
        $director = Director::findOrFail($id);
        $director->delete();
        return redirect(route('directors.index'));
    }
}
