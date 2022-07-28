<?php

namespace App\Models;

use App\Models\Reservation;
use App\Enums\VoitureStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Voiture extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'description', 'prix', 'status'];

    protected $cast = [
        'status' => VoitureStatus::class
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
