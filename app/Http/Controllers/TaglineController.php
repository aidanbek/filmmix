<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tagline\StoreTaglineRequest;
use App\Http\Requests\Tagline\UpdateTaglineRequest;
use App\Models\Film;
use App\Models\Tagline;
use Illuminate\Support\Facades\DB;

class TaglineController extends Controller
{
    public function index()
    {
        $taglines = Tagline::ordered()->get();

        return view('tagline.index', compact('taglines'));
    }

    public function create()
    {
        $films = Film::ordered()->get();

        return view('tagline.create', compact('films'));
    }

    public function store(StoreTaglineRequest $request)
    {
        DB::transaction(function () use ($request) {
            $tagline = new Tagline();
            $tagline->text = $request->text;
            $tagline->original_text = $request->original_text;
            $tagline->save();

            $tagline->films()->attach($request->films);
        });

        return back();
    }

    public function show(Tagline $tagline)
    {
        $tagline->load('films');

        return view('tagline.show', compact('tagline'));
    }

    public function edit(Tagline $tagline)
    {
        $tagline->load('films');
        $films = Film::ordered()->get();

        return view('tagline.edit', compact('tagline', 'films'));
    }

    public function update(UpdateTaglineRequest $request, Tagline $tagline)
    {
        DB::transaction(function () use ($request, $tagline) {
            $tagline->text = $request->text;
            $tagline->original_text = $request->original_text;
            $tagline->save();

            $tagline->films()->sync($request->films);
        });

        return redirect(route('taglines.show', $tagline->id));
    }

    public function destroy(Tagline $tagline)
    {
        DB::transaction(function () use ($tagline) {
            $tagline->films()->detach();
            $tagline->delete();
        });

        return redirect(route('taglines.index'));
    }
}
