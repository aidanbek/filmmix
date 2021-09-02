<?php

namespace App\Http\Controllers;

use App\Http\Requests\Director\StoreDirectorRequest;
use App\Http\Requests\Director\UpdateDirectorRequest;
use App\Models\Country;
use App\Models\Director;
use App\Models\Film;
use Illuminate\Support\Facades\DB;

class DirectorController extends Controller
{
    public function index()
    {
        $directors = Director::withCount('films')
            ->ordered()
            ->get();
        return view('director.index', compact('directors'));
    }

    public function create()
    {
        $films = Film::ordered()->get();
        $countries = Country::ordered()->get();

        return view('director.create', compact('films', 'countries'));
    }

    public function store(StoreDirectorRequest $request)
    {
        DB::transaction(function () use ($request) {
            $director = new Director();
            $director->title = $request->title;
            $director->birth_date = $request->birth_date;
            $director->save();

            $director->films()->attach($request->films);
            $director->countries()->attach($request->countries);
        });

        return back();
    }

    public function show($id)
    {
        $director = Director::with('films')
            ->with('films.actors')
            ->with('films.genres')
            ->with('films.directors')
            ->with('films.countries')
            ->findOrFail($id);
        $films = Film::ordered()->get();
        $countries = Country::ordered()->get();

        return view('director.show', compact('director', 'films', 'countries'));
    }

    public function update(UpdateDirectorRequest $request, $id)
    {
        DB::transaction(function () use ($request, $id) {
            $director = Director::findOrFail($id);
            $director->title = $request->title;
            $director->birth_date = $request->birth_date;
            $director->save();

            $director->films()->sync($request->films);
            $director->countries()->sync($request->countries);
        });

        return back();
    }

    public function destroy($id)
    {
        Director::findOrFail($id)->delete();
        return redirect(route('directors.index'));
    }
}
