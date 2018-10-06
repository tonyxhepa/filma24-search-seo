<?php

namespace App\Http\Controllers\Show;

use App\Model\Movie;
use App\Model\Serie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SEOMeta;
use OpenGraph;
use Twitter;

class MovieController extends Controller
{
    public function welcome()
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

        $movies = Movie::orderBy('created_at', 'desc')->limit(12)->get();
        $series = Serie::orderBy('created_at', 'desc')->limit(4)->get();
        return view('welcome', compact('movies', 'series'));
    }

    public function index()
    {
        SEOMeta::setTitle('Filma24.strea Filma me titra shqip');
        SEOMeta::setDescription('This is my page description');
        SEOMeta::setCanonical(url()->current());

        OpenGraph::setDescription('This is my page description');
        OpenGraph::setTitle('Filma24.strea Filma me titra shqip');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'movies');

        Twitter::setTitle('Filma24.strea Filma me titra shqip');
        Twitter::setSite('@filmametitra');

        $movies = Movie::orderBy('created_at', 'desc')->paginate(12);
        return view('movies.movies', compact('movies'));
    }

    public function show($slug)
    {
        $movie = Movie::where('slug', $slug)->first();
        SEOMeta::setTitle($movie->title);
        SEOMeta::setDescription($movie->description, 'filma dhe seriale me titra shqip');
        SEOMeta::addMeta('article:published_time', $movie->release_date, 'property');
        SEOMeta::addMeta('article:section', $movie->genres->first(), 'property');
        SEOMeta::addKeyword(['filma me titra shqip', 'seriale me titra shqip', 'seriale turke me titra shqip']);

        OpenGraph::setDescription($movie->description);
        OpenGraph::setTitle($movie->title);
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'al-al');
        OpenGraph::addProperty('locale:alternate', ['al-al', 'en-us']);

        OpenGraph::addImage(url()->asset('storage/'.$movie->poster_path));
        OpenGraph::addImage();
        OpenGraph::addImage(['url' => url()->asset('storage/'.$movie->poster_path), 'size' => 300]);
        OpenGraph::addImage(url()->asset('storage/'.$movie->poster_path), ['height' => 300, 'width' => 300]);

        // Namespace URI: http://ogp.me/ns/article#
        // article
        OpenGraph::setTitle($movie->tittle, 'me titra shqip')
            ->setDescription($movie->description, 'filma24.stream |filma dhe seriale me titra shqip')
            ->setType('article')
            ->setArticle([
                'published_time' => $movie->release_date,
                'section' => 'Movies',
            ]);
        return view('movies.show', compact('movie'));
    }
}
