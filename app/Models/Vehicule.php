<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricule',
        'date_achat',
        'km_par_defaut',
        'numero_permis',
        'photo',
        'statut',
        'chauffeur_id',
        'categorie_id',

    ];
    public function chauffeurs()
    {
        return $this->belongsTo(Chauffeur::class,'chauffeur_id');
    }
    public function categories()
    {
        return $this->belongsTo(Categorie::class);
    }





}
