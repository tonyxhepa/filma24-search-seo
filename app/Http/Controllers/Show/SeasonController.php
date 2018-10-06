<?php

namespace App\Http\Controllers\Show;

use App\Model\Season;
use App\Model\Serie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeasonController extends Controller
{
    public function show($slug, $id)
    {
        $season = Season::findOrFail($id);
        $serie = Serie::where('slug', $slug)->first();

        return view('series.seasons.show', compact('serie', 'season'));
    }
}
