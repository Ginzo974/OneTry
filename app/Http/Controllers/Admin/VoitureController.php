<?php

namespace App\Http\Controllers\Admin;

use App\Models\Voiture;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\VoitureStoreRequest;

class VoitureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voitures = Voiture::all();
        return view('admin.voitures.index', compact('voitures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.voitures.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VoitureStoreRequest $request)
    {
        $image = $request->file('image')->store('public/voitures');

        Voiture::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'prix' => $request->prix,
            'status' => $request->status,
        ]);

        return to_route('admin.voitures.index')->with('succès', 'Une voiture a bien été créée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Voiture $voiture)
    {

        return view('admin.voitures.edit', compact('voiture'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voiture $voiture)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',

            'prix' => 'required',
            'status' => 'required',

        ]);

        $image = $voiture->image;
        if ($request->hasFile('image')) {
            Storage::delete($voiture->image);
            $image = $request->file('image')->store('public/voitures');
        }

        $voiture->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'prix' => $request->prix,
            'status' =>  $request->status,
        ]);


        return to_route('admin.voitures.index')->with('succès', 'La voiture est modifiée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voiture $voiture)

    {
        $voiture->delete();

        return to_route('admin.voitures.index')->with('danger', 'La voiture est supprimée');
    }
}
