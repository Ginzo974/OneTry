<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'image', 'description', 'prix', 'status'];

    protected $cast = [
        'status' => VoitureStatus::class
    ];
}
