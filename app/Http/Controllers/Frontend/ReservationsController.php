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
        // dd('1');
        $daterequest = $request->date_res;
        $voiturerequest = $request->voitures_id;
        $reservation = Reservation::query()
            ->where('date_res', '=', $daterequest)
            ->where('voitures_id', '=', $voiturerequest)
            ->get();
        // dd(count($reservation));
        if (count($reservation) != 0) {
            return redirect()->back()
                ->with('error', "Pas de réservation disponible à cette date.");
        } else {
            Reservation::create($request->validated());
            return redirect()->route('indexUser')
                ->with('success', 'réservation réussie');
        }
    }

    // public function storepage_res(ReservationStoreRequest $request)
    // {
    //     dd("request");
    //     $daterequest = $request->date_res;
    //     $voiturerequest = $request->voitures_id;
    //     $reservation = Reservation::query()
    //         ->where('date_res', '=', $daterequest)
    //         ->where('voitures_id', '=', $voiturerequest)
    //         ->get();
    //     if (count($reservation) != 0) {
    //         return back();
    //     }


    //     Reservation::create($request->validated());
    //     return to_route('merci');
    // }
}
