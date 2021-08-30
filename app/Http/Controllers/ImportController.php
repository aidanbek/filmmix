<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Film;
use Illuminate\Http\Request;

class ImportController extends Controller
{
    public function index()
    {
        return view('import.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'import_type' => ['required', 'string'],
            'import_data' => ['required', 'string'],
        ]);

        $import_data_array = explode(',', $request->import_data);

        foreach ($import_data_array as $dataItem) {
            if ($request->import_type === 'actor_import') {
                Actor::firstOrCreate(['title' => $dataItem]);
            }
            if ($request->import_type === 'film_import') {
                Film::firstOrCreate(['title' => $dataItem]);
            }
        }

        return back();
    }
}
