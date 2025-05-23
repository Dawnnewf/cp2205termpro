<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();

        return view('types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'type' => 'required',
        ]);

        $type = new Type;

        $type->type = $request->type;

        $type->save();

        return redirect('/types')->with('success', 'Type has been created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        return view('types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view('types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $validateData = $request->validate([
            'type' => 'required',
        ]);

        $type->type = $request->type;

        $type->save();

        return redirect('/types')->with('success', 'Type has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect('/types')->with('success', 'Type has been deleted.');
    }
}
