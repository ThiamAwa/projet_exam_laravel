<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Models\Chauffeur;
use App\Models\Vehicule;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Définir une règle de validation personnalisée pour vérifier si le chauffeur et le véhicule ont le même type de catégorie
        Validator::extend('matching_code_permit', function ($attribute, $value, $parameters, $validator) {
            $chauffeur = Chauffeur::find($parameters[0]);
            $vehicule = Vehicule::find($parameters[1]);

            // Vérifier si le chauffeur et le véhicule existent
            if (!$chauffeur || !$vehicule) {
                return false;
            }

            // Récupérer le type de catégorie du chauffeur et du véhicule
            $categorie_permis_chauffeur = $chauffeur->categorie->categorie_permis;
            $type_vehicule = $vehicule->categorie->type_vehicules;

            // Comparer les types de catégorie
            return $categorie_permis_chauffeur === $type_vehicule;
        });

        
    }

}
