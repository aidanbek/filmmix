<?php

namespace App\Http\Controllers;

use App\Http\Requests\Country\StoreCountryRequest;
use App\Http\Requests\Country\UpdateCountryRequest;
use App\Models\Country;
use App\Models\Film;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::withCount('films')->ordered()->get();

        return view('country.index', compact('countries'));
    }

    public function create()
    {
        $films = Film::ordered()->get();
        $users = User::ordered()->get();

        return view('country.create', compact('films', 'users'));
    }

    public function store(StoreCountryRequest $request)
    {
        DB::transaction(function () use ($request) {
            $country = new Country();
            $country->title = $request->title;
            $country->code = $request->code;
            $country->save();

            $country->films()->attach($request->films);
            $country->users()->attach($request->users);
        });

        return back();
    }

    public function show(Country $country)
    {
        $country->load('films', 'users');
        $films = Film::ordered()->get();
        $users = User::ordered()->get();

        return view('country.show', compact('country', 'films', 'users'));
    }

    public function update(UpdateCountryRequest $request, Country $country)
    {
        DB::transaction(function () use ($request, $country) {
            $country->title = $request->title;
            $country->code = $request->code;
            $country->save();

            $country->films()->sync($request->films);
            $country->users()->sync($request->users);
        });

        return back();
    }

    public function destroy(Country $country)
    {
        $country->delete();
        return redirect(route('countries.index'));
    }
}
