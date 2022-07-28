<?php

namespace App\Models;

use App\Models\Voiture;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'num_tel',
        'date_res',
        'voitures_id'
    ];

    protected $dates = [
        'date_res'
    ];

    public function voiture()
    {
        return $this->belongsTo(Voiture::class, 'voitures_id');
    }
}
