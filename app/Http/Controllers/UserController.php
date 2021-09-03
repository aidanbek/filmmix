<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::ordered()
            ->get();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(StoreUserRequest $request)
    {
        DB::transaction(function () use ($request) {
            $user = new User();
            $user->title = $request->title;
            $user->save();
        });

        return back();
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('user.show', compact('user'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        DB::transaction(function () use ($request, $id) {
            $user = User::findOrFail($id);
            $user->title = $request->title;
            $user->save();
        });

        return back();
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect(route('users.index'));
    }
}
