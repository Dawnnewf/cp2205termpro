<?php

namespace App\Http\Controllers;

use App\Models\Dvd;
use App\Models\Dvdformat;
use App\Models\Location;
use App\Models\Genre;
use App\Models\Type;

use Illuminate\Http\Request;

class DvdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dvds = Dvd::all();
        $dvds = Dvd::all()->filter(request('search'));

        $dvds = Dvd::paginate(8);

        return view('dvds.index', compact('dvds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dvdformats = Dvdformat::all();
        $types = Type::all();
        $genres = Genre::all();

        return view('dvds.create', compact('dvdformats', 'types', 'genres'));
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
        $genres = Genre::all();

        return view('dvds.show', compact('dvd', 'genres'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dvd $dvd)
    {
        $dvds = Dvd::all();
        $dvdformats = Dvdformat::all();
        $types = Type::all();
        $genres = Genre::all();
        $locations = Location::all();

        return view('dvds.edit', compact('dvd', 'dvdformats', 'types', 'genres', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dvd $dvd)
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

        $dvd->title = $request->title;
        $dvd->dvdformat_id = $request->dvdformat_id;
        $dvd->type_id = $request->type_id;
        $dvd->location_id = $request->location_id;
        $dvd->imageLink = $request->imageLink;
        $dvd->website = $request->website;
        $dvd->imdbLink = $request->imdbLink;
        $dvd->starRating = $request->starRating;
        $dvd->numDisks = $request->numDisks;

        $dvd->update();
        //dd($request->genres);

        $dvd->genres()->sync($request->genres);

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
