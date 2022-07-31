<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Voiture;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VoituresController extends Controller
{
    public function index()
    {
        $voitures = Voiture::all();
        return view('FrontendVoiture.index', compact('voitures'));
    }
}
