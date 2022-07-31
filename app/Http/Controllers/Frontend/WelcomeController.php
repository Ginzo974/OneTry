<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Voiture;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function index()
    {
        $specials = Voiture::all();
        return view('welcome', compact('specials'));
    }
}
