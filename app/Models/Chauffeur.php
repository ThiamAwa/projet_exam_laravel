<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chauffeur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'experience',
        'numero_permis',
        'date_emission',
        'expiration',
        'categorie_id',
        'contrat',
    ];

    public function vehicules()
    {
        return $this->hasOne(Vehicule::class,'vehicule_id');
    }

    public function categories()
    {
        return $this->belongsTo(Categorie::class,'categorie_id');
    }


}
