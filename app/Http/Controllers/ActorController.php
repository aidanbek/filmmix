<?php


namespace App\Http\Controllers;


use App\Actor;
use Illuminate\Http\Request;

class ActorController
{
    public function index()
    {
        $actors = Actor::with('films')->orderBy('title')->get();
        return view('actor.index', compact('actors'));
    }

    public function create()
    {
        return view('actor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        Actor::create([
            'title' => $request->title
        ]);

        return back();
    }

    public function show($id)
    {
        //
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
