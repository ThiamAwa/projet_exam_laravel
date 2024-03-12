<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'catagorie_permis',
        'type_vehicules',
        'descriptions',

    ];

    public function vehicules()
    {
        return $this->hasMany(Vehicule::class,'categorie_id');
    }
    public function chauffeurs()
    {
        return $this->hasMany(Chauffeur::class,'categorie_id');
    }
}
