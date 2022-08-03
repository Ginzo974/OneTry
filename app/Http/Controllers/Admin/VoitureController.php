<?php

namespace App\Http\Controllers\Admin;

use App\Models\Voiture;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\VoitureStoreRequest;
use Illuminate\Support\Facades\DB;

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
        $image = $request->file('image')->store('public/voitures'); // l'image qui sera récupérer sera stocker dans 'public/voiture'

        Voiture::create([
            'name' => $request->name, // récupère le nom dans le champ input et le créer dans la base de données
            'description' => $request->description, // récupère la description dans le champ input et le créer dans la base de données
            'image' => $image, // récupère l'image dans le champ input et le créer dans la base de données
            'prix' => $request->prix, // récupère le prix dans le champ input et le créer dans la base de données
            'status' => $request->status, // récupère le statut dans le champ input et le créer dans la base de données
        ]);

        return to_route('admin.voitures.index')->with('succès', 'Une voiture a bien été créée');
        // retourne vers la vue 'admin.voitures.index' avec un message success
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
            'name' => 'required', // Dans la base de données, la colonne nom est obligatoire pour pouvoir valider la modification
            'description' => 'required', // Dans la base de données, la colonne description est obligatoire pour pouvoir valider la modification

            'prix' => 'required', // Dans la base de données, la colonne prix est obligatoire pour pouvoir valider la modification
            'status' => 'required', // Dans la base de données, la colonne status est obligatoire pour pouvoir valider la modification

        ]);

        $image = $voiture->image; // $image récupère l'image de la voiture concerné dans la bdd 
        if ($request->hasFile('image')) { // si l'image concerné est supprimé alors la modification se met en place 
            Storage::delete($voiture->image);
            $image = $request->file('image')->store('public/voitures');
        }

        $voiture->update([
            'name' => $request->name, // récupère le nom dans le champ input et le créer dans la base de données
            'description' => $request->description, // récupère la description dans le champ input et le créer dans la base de données
            'image' => $image, // récupère l'image dans le champ input et le créer dans la base de données
            'prix' => $request->prix, // récupère le prix dans le champ input et le créer dans la base de données
            'status' =>  $request->status, // récupère le statut dans le champ input et le créer dans la base de données
        ]);


        return to_route('admin.voitures.index')->with('succès', 'La voiture est modifiée');
        // retourne vers la vue 'admin.voitures.index' avec un message success
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voiture $id_voiture, $id_voiture2)

    {

        $reservations = Reservation::query()
            ->where('voitures_id', '=', $id_voiture2)
            ->get();

        if (count($reservations) == null) {
            DB::table('voitures')
                ->where('id', '=', $id_voiture2)
                ->delete();
            return redirect()->back()->with('warning', 'la voiture a été supprimé');
        }


        return redirect()->back()->with('danger', 'voiture n\'est pas a supprimé');
    }
}
