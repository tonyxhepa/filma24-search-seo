<?php

namespace App\Http\Controllers\Show;

use App\Model\Episode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EpisodeController extends Controller
{
    public function show($slug)
    {
        $episode = Episode::where('slug', $slug)->first();

        return view('episodes.show', compact('episode'));
    }
}
