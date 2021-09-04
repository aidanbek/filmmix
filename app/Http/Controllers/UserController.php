<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\Profession;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::ordered()->get();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        $professions = Profession::ordered()->get();

        return view('user.create', compact('professions'));
    }

    public function store(StoreUserRequest $request)
    {
        DB::transaction(function () use ($request) {
            $user = new User();
            $user->title = $request->title;
            $user->save();

            $user->professions()->attach($request->professions);
        });

        return back();
    }

    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    public function edit(User $user)
    {
        $professions = Profession::ordered()->get();

        return view('user.edit', compact('user', 'professions'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        DB::transaction(function () use ($request, $user) {
            $user->title = $request->title;
            $user->save();

            $user->professions()->sync($request->professions);
        });

        return redirect(route('users.show', $user->id));
    }

    public function destroy(User $user)
    {
        DB::transaction(function () use ($user) {
            $user->countries()->detach();
            $user->professions()->detach();
            $user->delete();
        });

        return redirect(route('users.index'));
    }
}
