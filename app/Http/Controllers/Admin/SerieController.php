<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateSerieRequest;
use App\Model\Serie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $series = Serie::paginate(16);

        return view('admin.serie.index', compact('series'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.serie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSerieRequest $request)
    {
        $serie = new Serie;
        $serie->title = $request->input('title');
        $serie->created_year = $request->input('created_year');
        if ($request->hasFile('poster_path')){
            $image = $request->file('poster_path');
            $extension = $image->getClientOriginalExtension();
            $image_name = time(). '-series.' . $extension;
            $path = $image->storeAs('series', $image_name, 'public');
            $serie->poster_path = $path;
        }
        $serie->save();

        return redirect()->route('serie.index')->with('message', 'ju krijuat nje serie te re');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $serie = Serie::findOrFail($id);
        return view('admin.serie.edit', compact('serie'));
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
        $serie = Serie::findOrFail($id);
        $serie->title = $request->input('title');
        $serie->created_year = $request->input('created_year');
        if ($request->hasFile('poster_path')){
            $image = $request->file('poster_path');
            $extension = $image->getClientOriginalExtension();
            $image_name = time(). '-series.' . $extension;
            $path = $image->storeAs('series', $image_name, 'public');
            Storage::delete('public/'.$serie->poster_path);
            $serie->poster_path = $path;
        }
        $serie->save();

        return redirect()->route('serie.index')->with('message', 'u apdetua me sukses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $serie = Serie::findOrFail($id);
        Storage::delete('public/'.$serie->poster_path);
        $serie->delete();

        return back()->with('message', 'u fshij');
    }
}
