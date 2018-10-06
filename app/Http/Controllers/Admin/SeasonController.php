<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateSeasonRequest;
use App\Model\Season;
use App\Model\Serie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeasonController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Serie $serie)
    {
        return view('admin.serie.season.create', compact('serie'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Serie $serie, CreateSeasonRequest $request)
    {

        $season = new Season;
        $season->season_nr = $request->input('season_nr');
        if ($request->hasFile('poster_path')){
            $image = $request->file('poster_path');
            $extension = $image->getClientOriginalExtension();
            $image_name = time(). '-series.' . $extension;
            $path = $image->storeAs('series', $image_name, 'public');
            $season->poster_path = $path;
        }
        $serie->seasons()->save($season);


        return redirect()->route('serie.edit', $serie->id)->with('message', 'ju krijuat nje season te ri');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Serie $serie,$id)
    {
        $season = Season::findOrFail($id);

        return view('admin.serie.season.edit', compact('serie', 'season'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Serie $serie,$id)
    {
        $season = Season::findOrFail($id);
        $season->season_nr = $request->input('season_nr');
        if ($request->hasFile('poster_path')){
            $image = $request->file('poster_path');
            $extension = $image->getClientOriginalExtension();
            $image_name = time(). '-series.' . $extension;
            $path = $image->storeAs('series', $image_name, 'public');
            $season->poster_path = $path;
        }
        $season->save();

        return redirect()->route('serie.edit', $serie->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Serie $serie,$id)
    {
        $season = Season::findOrFail($id);
        $season->delete();
        return redirect()->route('serie.edit', $serie->id);
    }
}
