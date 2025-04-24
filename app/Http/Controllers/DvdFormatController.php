<?php

namespace App\Http\Controllers;

use App\Models\Dvdformat;
use Illuminate\Http\Request;

class DvdFormatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dvdformats = Dvdformat::all();

        return view('dvdformats.index', compact('dvdformats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dvdformats.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'dvdFormat' => 'required',
        ]);

        $dvdformat = new Dvdformat;

        $dvdformat->dvdFormat = $request->dvdFormat;

        $dvdformat->save();

        return redirect('/dvdformats')->with('success', 'Dvdformat has been created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dvdformat $dvdformat)
    {
        return view('dvdformats.show', compact('dvdformat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dvdformat $dvdformat)
    {
        return view('dvdformats.edit', compact('dvdformat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dvdformat $dvdformat)
    {
        $validateData = $request->validate([
            'dvdFormat' => 'required',
        ]);

        $dvdformat->dvdFormat = $request->dvdFormat;

        $dvdformat->save();

        return redirect('/dvdformats')->with('success', 'Dvdformat has been updates.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dvdformat $dvdformat)
    {
        $dvdformat->delete();
        return redirect('/dvdformats')->with('success', 'Dvdformat has been deleted.');
    }
}
