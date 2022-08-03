<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Voiture;
use App\Rules\DateBetween;
use App\Models\Reservation;
use App\Enums\VoitureStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStoreRequest;

class ReservationsController extends Controller
{
    public function page_res(Request $request)
    {
        $voitures = Voiture::where('status', VoitureStatus::Disponible)->get();
        $min_date = Carbon::today();
        return view('FrontendReservation.page_res', compact('voitures', 'min_date'));
    }

    public function pageResa(ReservationStoreRequest $request)
    {

        $daterequest = $request->date_res; // récupère la date demandée 
        $voiturerequest = $request->voitures_id; // récupère la voiture demandée 
        $reservation = Reservation::query()
            ->where('date_res', '=', $daterequest) // ou dans la colonne date_res est égale à la date demandée
            ->where('voitures_id', '=', $voiturerequest) // ou dans la colonne voitures_id est égale à la voiture demandée
            ->get(); //récupère

        if (count($reservation) != 0) {
            return redirect()->back()
                ->with('error', "Pas de réservation disponible à cette date.");
            // si la réservation est ≠ de 0 (une réservation identique a cette date), alors il sera redirigé sur la même page
            // avec une erreur 

        } else {
            Reservation::create($request->validated());
            return redirect()->route('indexUser')
                ->with('success', 'réservation réussie');
        } // si la réservation est validé alors il sera il sera redirigé sur la page 'indexUser' avec un message 'succès'
    }
}
