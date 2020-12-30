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
        $actors = Actor::with('films')->orderBy('title')->get();
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
        ]);

        DB::transaction(function () use ($request) {
            $actor = Actor::create(['title' => $request->title]);
            $actor->films()->attach($request->films);
        });

        return back();
    }

    public function show($id)
    {
        $actor = Actor::with('films', 'films.actors', 'films.genres', 'films.directors')
            ->findOrFail($id)
            ->first();
        $films = Film::orderBy('title')->get();
        return view('actor.show', compact('actor', 'films'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'films' => 'nullable|array|exists:films,id'
        ]);

        DB::transaction(function () use($request, $id) {
            $actor = Actor::where('id', $id)->first();
            $actor->title = $request->title;
            $actor->save();

            if (is_null($request->films)) $request->films = [];
            $actor->films()->sync($request->films);
        });

        return back();
    }

    public function destroy($id)
    {
        $actor = Actor::where('id', $id)->first();
        $actor->delete();
        return redirect(route('actors.index'));
    }
}
