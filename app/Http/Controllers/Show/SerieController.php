<?php

namespace App\Http\Controllers\Show;

use App\Model\Serie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SerieController extends Controller
{
    public function index()
    {
        $series = Serie::orderBy('created_at', 'desc')->paginate(16);

        return view('series.index', compact('series'));
    }

    public function show($slug)
    {
        $serie = Serie::where('slug', $slug)->first();
        return view('series.show', compact('serie'));
    }
}
