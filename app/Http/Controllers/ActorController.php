<?php

namespace App\Http\Controllers;

use App\Actor;
use App\Film;
use Illuminate\Http\Request;

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

        $actor = Actor::create([
            'title' => $request->title
        ]);

        $actor->films()->attach($request->films);

        return back();
    }

    public function show($id)
    {
        $actor = Actor::with('films', 'films.actors', 'films.genres', 'films.directors')
            ->where('id', $id)
            ->first();
        return view('actor.show', compact('actor'));
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        $actor = Actor::where('id', $id)->first();
        $actor->delete();
        return redirect(route('actors.index'));
    }
}
