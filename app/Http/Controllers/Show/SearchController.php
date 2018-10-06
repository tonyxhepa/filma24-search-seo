<?php

namespace App\Http\Controllers\Show;

use App\Model\Movie;
use App\Model\Serie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SEOMeta;
use OpenGraph;
use Twitter;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        SEOMeta::setTitle('Filma24.strea Filma me titra shqip');
        SEOMeta::setDescription('This is my page description');
        SEOMeta::setCanonical(url()->current());

        OpenGraph::setDescription('This is my page description');
        OpenGraph::setTitle('Home');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'articles');

        Twitter::setTitle('Filma24.strea Filma me titra shqip');
        Twitter::setSite('@filmametitra');

        if ($request->has('search')) {
            $movies = Movie::search($request->get('search'))->get();
            $series = Serie::search($request->get('search'))->get();
        } else {
            $movies = Movie::get();
            $series = Serie::get();
        }
        return view('search', compact('movies', 'series'));
    }
}
