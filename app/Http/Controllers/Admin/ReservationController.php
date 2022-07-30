<?php

namespace App\Http\Controllers\Admin;

use App\Models\Voiture;
use App\Models\Reservation;
use App\Enums\VoitureStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStoreRequest;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $reservations = Reservation::all();
        $reservations = Reservation::join('voitures', 'reservations.voitures_id', '=', 'voitures.id')
            ->get();
        // dd($reservations);

        return view('admin.reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $voitures = Voiture::where('status', VoitureStatus::Disponible)->get();
        return view('admin.reservations.create', compact('voitures'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReservationStoreRequest $request)
    {

        $daterequest = $request->date_res;
        $voiturerequest = $request->voitures_id;

        $reservation = Reservation::query()
            ->where('date_res', '=', $daterequest)
            ->where('voitures_id', '=', $voiturerequest)
            ->get();

        if (count($reservation) != 0) {
            return back()->with('danger', 'Désolé cette voiture est déjà réservé à ce jour');
        }

        Reservation::create($request->validated());

        return to_route('admin.reservations.index')->with('succès', 'La réservation a bien été créée');
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
