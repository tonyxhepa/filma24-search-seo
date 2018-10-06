<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateMovieRequest;
use App\Model\Genre;
use App\Model\Movie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function admin()
    {
        return view('admin.index');
    }
    public function index()
    {
        $movies = Movie::paginate(16);

        return view('admin.movie.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::pluck('name', 'id');

        return view('admin.movie.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $movie = new Movie;
        $movie->title = $request->title;
        $movie->runing_time = $request->runing_time;
        $movie->release_date = $request->release_date;
        $movie->description = $request->description;
        $movie->rating = $request->rating;
        if ($request->hasFile('poster_path')){
            $image = $request->file('poster_path');
            $extension = $image->getClientOriginalExtension();
            $image_name = time(). '-movies.' . $extension;
            $path = $image->storeAs('movies', $image_name, 'public');
            $movie->poster_path = $path;
        }
        $movie->save();
        if ($request->has('genres')){
            $movie->genres()->attach($request->genres);
        }

        return redirect()->route('movie.index')->with('message', 'ju krijuat nje movie te re');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        $genres = Genre::all();

        return view('admin.movie.edit', compact('movie', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $movie = Movie::findOrFail($id);
        $movie->title = $request->input('title');
        $movie->runing_time = $request->input('runing_time');
        $movie->release_date = $request->input('release_date');
        $movie->description = $request->input('description');
        $movie->rating = $request->input('rating');
        if ($request->hasFile('poster_path')){
            $image = $request->file('poster_path');
            $extension = $image->getClientOriginalExtension();
            $image_name = time(). '-movies.' . $extension;
            $path = $image->storeAs('movies', $image_name, 'public');
            Storage::delete('public/'.$movie->poster_path);
            $movie->update(['poster_path' => $path]);
        }
        if ($request->has('genres')){
            $movie->genres()->sync($request->genres);
        }

        return redirect()->route('movie.index')->with('message', 'ju apdetuat movien me sukses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        Storage::delete('public/'.$movie->poster_path);
        $movie->delete();

        return back()->with('message', 'u fshij me sukses');
    }

    public function addEmbed($id, Request $request)
    {
        $movie = Movie::findOrFail($id);
        $embeds = $movie->embeds();
        $embeds->create([
            'web_name' => $request->web_name,
            'web_url' => $request->web_url,
        ]);
        return back()->with('message', 'ju shtuat nje embed link');
    }
    public function addWatchlink($id, Request $request)
    {
        $movie = Movie::findOrFail($id);
        $link = $movie->watchlinks();
        $link->create([
            'web_name' => $request->web_name,
            'web_url' => $request->web_url,
        ]);
        return back()->with('message', 'ju shtuat nje watch link');
    }
    public function addDownloadlink($id, Request $request)
    {
        $movie = Movie::findOrFail($id);
        $link = $movie->downloadlinks();
        $link->create([
            'web_name' => $request->web_name,
            'web_url' => $request->web_url,
        ]);
        return back()->with('message', 'ju shtuat nje download link');
    }
    public function addTrailerlink($id, Request $request)
    {
        $movie = Movie::findOrFail($id);
        $link = $movie->trailerlinks();
        $link->create([
            'web_name' => $request->web_name,
            'web_url' => $request->web_url,
        ]);
        return back()->with('message', 'ju shtuat nje trailer link');
    }
}
