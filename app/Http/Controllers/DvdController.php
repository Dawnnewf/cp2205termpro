<?php

namespace App\Http\Controllers;

use App\Models\Dvd;
use Illuminate\Http\Request;

class DvdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dvds = Dvd::all();

        return view('dvds.index', compact('dvds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dvds.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required',
            'dvdformat_id' => 'required',
            'type_id' => 'required',
            'location_id' => 'required',
            'imageLink' => 'required',
            'website' => 'required',
            'imdbLink' => 'required',
            'starRating' => 'required',
            'numDisks' => 'required',
        ]);

        $dvd = new Dvd;

        $dvd->title = $request->title;
        $dvd->dvdformat_id = $request->dvdformat_id;
        $dvd->type_id = $request->type_id;
        $dvd->location_id = $request->location_id;
        $dvd->imageLink = $request->imageLink;
        $dvd->website = $request->website;
        $dvd->imdbLink = $request->imdbLink;
        $dvd->starRating = $request->starRating;
        $dvd->numDisks = $request->numDisks;

        if($request->numEpisode) {
            $dvd->numEpisode = $request->numEpisode;
        }

        $dvd->save();

        return redirect('/dvds')->with('success', 'DVD has been created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dvd $dvd)
    {
        return view('dvds.show', compact('dvd'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dvd $dvd)
    {
        $dvds = Dvd::all();
        return view('dvds.edit', compact('dvd'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dvd $dvd)
    {
        $dvd->dvd = $request->dvd;
        $dvd->save();

        return redirect('dvds')->with('success', 'DVD has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dvd $dvd)
    {
        $dvd->delete();
        return redirect('/dvds')->with('success', 'DVD has been deleted.');
    }
}