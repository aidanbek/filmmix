<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profession\StoreProfessionRequest;
use App\Http\Requests\Profession\UpdateProfessionRequest;
use App\Models\Profession;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ProfessionController extends Controller
{
    public function index()
    {
        $professions = Profession::ordered()->get();

        return view('profession.index', compact('professions'));
    }

    public function create()
    {
        $users = User::ordered()->get();

        return view('profession.create', compact('users'));
    }

    public function store(StoreProfessionRequest $request)
    {
        DB::transaction(function () use ($request) {
            $profession = new Profession();
            $profession->title = $request->title;
            $profession->save();

            $profession->users()->attach($request->users);
        });

        return back();
    }

    public function show(Profession $profession)
    {
        $profession->load('users');

        return view('profession.show', compact('profession'));
    }

    public function edit(Profession $profession)
    {
        $profession->load('users');
        $users = User::ordered()->get();

        return view('profession.edit', compact('profession', 'users'));
    }

    public function update(UpdateProfessionRequest $request, Profession $profession)
    {
        DB::transaction(function () use ($request, $profession) {
            $profession->title = $request->title;
            $profession->save();

            $profession->users()->sync($request->users);
        });

        return redirect(route('professions.show', $profession->id));
    }

    public function destroy(Profession $profession)
    {
        DB::transaction(function () use ($profession) {
            $profession->users()->detach();
            $profession->delete();
        });
        return redirect(route('professions.index'));
    }
}
