<?php

namespace App\Http\Controllers;

use App\Http\Requests\Actor\StoreActorRequest;
use App\Http\Requests\Actor\UpdateActorRequest;
use App\Models\Actor;
use App\Models\Country;
use App\Models\Film;
use Illuminate\Support\Facades\DB;

class ActorController extends Controller
{
    public function index()
    {
        $actors = Actor::withCount('films')
            ->ordered()
            ->get();
        return view('actor.index', compact('actors'));
    }

    public function create()
    {
        $films = Film::ordered()->get();
        $countries = Country::ordered()->get();
        return view('actor.create', compact('films', 'countries'));
    }

    public function store(StoreActorRequest $request)
    {
        DB::transaction(function () use ($request) {
            $actor = new Actor();
            $actor->title = $request->title;
            $actor->birth_date = $request->birth_date;
            $actor->save();

            $actor->films()->attach($request->films);
            $actor->countries()->attach($request->countries);
        });

        return back();
    }

    public function show($id)
    {
        $actor = Actor::with('films')
            ->with('films.actors')
            ->with('films.genres')
            ->with('films.directors')
            ->with('films.countries')
            ->findOrFail($id);
        $films = Film::ordered()->get();
        $countries = Country::ordered()->get();

        return view('actor.show', compact('actor', 'films', 'countries'));
    }

    public function update(UpdateActorRequest $request, $id)
    {
        DB::transaction(function () use ($request, $id) {
            $actor = Actor::findOrFail($id);
            $actor->title = $request->title;
            $actor->birth_date = $request->birth_date;
            $actor->save();

            $actor->films()->sync($request->films);
            $actor->countries()->sync($request->countries);
        });

        return back();
    }

    public function destroy($id)
    {
        Actor::findOrFail($id)->delete();
        return redirect(route('actors.index'));
    }
}
