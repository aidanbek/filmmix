<?php

namespace App\Http\Controllers;

use App\Actor;
use App\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActorController extends Controller
{
    public function index()
    {
        $actors = Actor::with('films')
            ->orderBy('title')
            ->get();
        return view('actor.index', compact('actors'));
    }

    public function create()
    {
        $films = Film::orderBy('title')->get();
        return view('actor.create', compact('films'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:users,title',
            'films' => 'nullable|array|exists:films,id',
            'birth_date' => 'nullable|date'
        ]);

        DB::transaction(function () use ($request) {
            $actor = Actor::create([
                'title' => $request->title,
                'birth_date' => $request->birth_date
            ]);
            $actor->films()->attach($request->films);
        });

        return back();
    }

    public function show($id)
    {
        $actor = Actor::with('films', 'films.actors', 'films.genres', 'films.directors')
            ->findOrFail($id);
        $films = Film::orderBy('title')->get();
        return view('actor.show', compact('actor', 'films'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'films' => 'nullable|array|exists:films,id',
            'birth_date' => 'nullable|date'
        ]);

        DB::transaction(function () use ($request, $id) {
            Actor::findOrFail($id)->update([
                'title' => $request->title,
                'birth_date' => $request->birth_date
            ]);

            $actor = Actor::findOrFail($id);

            if (is_null($request->films)) $request->films = [];
            $actor->films()->sync($request->films);
        });

        return back();
    }

    public function destroy($id)
    {
        $actor = Actor::findOrFail($id);
        $actor->delete();
        return redirect(route('actors.index'));
    }
}
