<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'heure_debut',
        'heure_fin',
        'date_debut',
        'date_fin',
        'lieu_depart',
        'lieu_arrivee',
        'vehicule_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class,'vehicule_id');
    }
}
