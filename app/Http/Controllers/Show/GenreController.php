<?php

namespace App\Http\Controllers\Show;

use App\Model\Genre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenreController extends Controller
{
    public function showGenreBySlug($slug)
    {
        $genre = Genre::where('slug', $slug)->first();

        return view('genres.show', compact('genre'));
    }
}
