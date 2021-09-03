<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profession\StoreProfessionRequest;
use App\Http\Requests\Profession\UpdateProfessionRequest;
use App\Models\Profession;
use Illuminate\Support\Facades\DB;

class ProfessionController extends Controller
{
    public function index()
    {
        $professions = Profession::ordered()
            ->get();
        return view('profession.index', compact('professions'));
    }

    public function create()
    {
        return view('profession.create');
    }

    public function store(StoreProfessionRequest $request)
    {
        DB::transaction(function () use ($request) {
            $profession = new Profession();
            $profession->title = $request->title;
            $profession->save();
        });

        return back();
    }

    public function show($id)
    {
        $profession = Profession::findOrFail($id);

        return view('profession.show', compact('profession'));
    }

    public function update(UpdateProfessionRequest $request, $id)
    {
        DB::transaction(function () use ($request, $id) {
            $profession = Profession::findOrFail($id);
            $profession->title = $request->title;
            $profession->save();
        });

        return back();
    }

    public function destroy($id)
    {
        Profession::findOrFail($id)->delete();
        return redirect(route('professions.index'));
    }
}
