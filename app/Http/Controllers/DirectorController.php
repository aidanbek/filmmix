<?php


namespace App\Http\Controllers;


use App\Director;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    public function index()
    {
        $directors = Director::orderBy('title')->get();
        return view('director.index', compact('directors'));
    }

    public function create()
    {
        return view('director.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        Director::create([
            'title' => $request->title
        ]);

        return back();
    }

    public function show($id)
    {
        $director = Director::with('films', 'films.actors', 'films.genres', 'films.directors')
            ->where('id', $id)
            ->first();
        return view('director.show', compact('director'));
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        $director = Director::where('id', $id)->first();
        $director->delete();
        return redirect(route('directors.index'));
    }
}
