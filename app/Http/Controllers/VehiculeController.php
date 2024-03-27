<?php

namespace App\Http\Controllers;

use App\Models\Chauffeur;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Location;


use Illuminate\Support\Facades\Auth;


class VehiculeController extends Controller
{


    public function index()
    {

         $nombreVehiculesEnPanne = Vehicule::where('statut', 'en_panne')->count();
        $nombreVehiculesEnLocation = Vehicule::where('statut', 'en_location')->count();
        $nombreVehiculesHorsservice = Vehicule::where('statut', 'hors_service')->count();
        $nombreVehiculesEnService = Vehicule::where('statut', 'en_service')->count();


        $totalVehicules = Vehicule::count();
        $pourcentageVehiculesEnPanne = ($nombreVehiculesEnPanne / $totalVehicules) * 100;
        $pourcentageVehiculesEnLocation = ($nombreVehiculesEnLocation / $totalVehicules) * 100;
        $pourcentageVehiculesHorsservice = ($nombreVehiculesHorsservice / $totalVehicules) * 100;
        $pourcentageVehiculesEnService = ($nombreVehiculesEnService / $totalVehicules) * 100;

        if(Auth::id()){
            $usertype=Auth()->user()->usertype;

            if($usertype==='admin'){
                $listeV=Vehicule::All();
                return view('layoutsAdmin.vehicule', compact('listeV', 'pourcentageVehiculesEnPanne','pourcentageVehiculesEnLocation','pourcentageVehiculesHorsservice','pourcentageVehiculesEnService'));
            } elseif($usertype=='user'){
                $listeV=Vehicule::All();
                return view('layouts.navigation', compact('listeVUser'));
            } else {
                return view('welcome');
            }
        }
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $listeV = new Vehicule();
        $listeChauf=Chauffeur::All();
        $listeCat=Categorie::All();


        return view('layoutsAdmin.addVehicule',['listeV'=>$listeV,'listeChauf'=>$listeChauf,
        'listeCat'=>$listeCat
    ]);
    }

   
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'matricule' => 'required|string|regex:/^[A-Z]{2}\s\d{4}\s[A-Z]{2}$/|unique:vehicules',
            'date_achat' => 'required|date|before_or_equal:today',
            'km_par_defaut' => 'required|numeric',
            'statut' => 'required|string',
            'categorie_id' => 'required|exists:categories,id',
            'photo' => 'required|mimes:jpg,png,jpeg,gif',
            'chauffeur_id' => 'required|exists:chauffeurs,id',
        ]);


        $categorieVehicule = Categorie::find($validatedData['categorie_id']);


        $chauffeur = Chauffeur::find($validatedData['chauffeur_id']);
        //chaffeur n'existe pas 2 fois pour meme statut
        $existingVehicle = Vehicule::where('chauffeur_id', $validatedData['chauffeur_id'])
        ->where('statut', $validatedData['statut'])
        ->first();

        if ($existingVehicle) {
            return redirect()->back()->withErrors(['statut' => 'Le chauffeur a déjà un véhicule avec le même statut.'])->withInput();
        }


        if ($chauffeur && $categorieVehicule) {

            if ($categorieVehicule->id === $chauffeur->categorie_id) {

                $fileName = time() . '.' . $request->photo->extension();
                $request->photo->storeAs('public/images', $fileName);


                $vehicule = new Vehicule();
                $vehicule->matricule = $validatedData['matricule'];
                $vehicule->date_achat = $validatedData['date_achat'];
                $vehicule->km_par_defaut = $validatedData['km_par_defaut'];
                $vehicule->statut = $validatedData['statut'];
                $vehicule->chauffeur_id = $validatedData['chauffeur_id'];
                $vehicule->categorie_id = $validatedData['categorie_id'];
                $vehicule->photo = $fileName;


                $vehicule->save();


                return redirect()->route('Vehicule.index')->with('success', 'Véhicule ajouté avec succès.');
            } else {

                return redirect()->back()->withErrors(['categorie_id' => 'Le type de permis du chauffeur ne correspond pas à la catégorie du véhicule.'])->withInput();
            }
        } else {

            return redirect()->back()->withErrors(['chauffeur_id' => 'Le chauffeur sélectionné est invalide.', 'categorie_id' => 'La catégorie du véhicule est invalide.'])->withInput();
        }
    }








    /**
     * Display the specified resource.
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $listeV = new Vehicule();
        $listeChauf=Chauffeur::All();
        $listeCat=Categorie::All();


        return view('layoutsAdmin.addVehicule',['listeV'=>$listeV->find($id),'listeChauf'=>$listeChauf, 'listeCat'=>$listeCat]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'date_achat' => 'required|date',
            'km_par_defaut' => 'required|numeric',
            'statut' => 'required|string',
            'chauffeur_id' => 'nullable|exists:chauffeurs,id' ,
            'photo'=>'required|mimes:jpg,png,jpeg,gif',
            'categorie_id' => 'required|string',

        ]);

        $fileName = time(). '.' . $request->photo->extension();
        $request->photo->storeAs('public/images', $fileName);




        $vehicule = Vehicule::find($id);
        $vehicule->matricule = $request['matricule'];
        $vehicule->date_achat = $validatedData['date_achat'];
        $vehicule->km_par_defaut = $validatedData['km_par_defaut'];
        $vehicule->statut = $validatedData['statut'];
        $vehicule->chauffeur_id = $validatedData['chauffeur_id'];
        $vehicule->categorie_id = $validatedData['categorie_id'];
        $vehicule->photo=$fileName;

        $vehicule->save();


        return redirect()->route('Vehicule.index')->with('success', 'Véhicule ajouté avec succès.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Vehicule::destroy($id);
        return to_route('Vehicule.index');
    }


    public function openDistanceModal(Request $request)
{
  
    $kilometrageParDefaut = 10000;

    
    $lieuDepart = $request->input('lieu_depart');
    $lieuArrivee = $request->input('lieu_arrivee');

   
    $locationsActives = Location::where('vehicule_id', $request->input('vehicule_id'))
        ->whereNull('date_arrivee') 
        ->get();

   
    $distanceMaps = 150;

    
    $kilometrageActuel = $kilometrageParDefaut;

    if ($locationsActives->count() > 0) {
       
        $distanceLocationsActives = $locationsActives->sum('distance');
        $kilometrageActuel += $distanceLocationsActives;
    }

   
    return response()->json([
        'kilometrage_actuel' => $kilometrageActuel,
        'distance_maps' => $distanceMaps,
    ]);
}

}
