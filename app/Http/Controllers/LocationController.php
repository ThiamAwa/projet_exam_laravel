<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\User;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class LocationController extends Controller
{
   
    public function index()
    {
        if (Auth::check()) {
            $usertype = Auth::user()->usertype;

            if ($usertype === 'admin') {
                $listeL = Location::all();
                return view('layoutsAdmin.listeLoaction', ['listeL' => $listeL]);
            } elseif ($usertype === 'user') {
               
                $listeVUser = Vehicule::all();
                    $listeL = Location::all();
                    $locationL = Location::where('client_id', Auth::id())->latest()->first();
    
                    $lastLocationId = $locationL ? $locationL->id : null;  
                    return view('layouts.navigation', [
                        'listeVUser'=>$listeVUser,
                        'lastLocationId' => $lastLocationId,
                        'locationL'=>$locationL,
                    ]);
            } else {
                return redirect()->back();
            }
        }
    }

    /**
     * Affiche le formulaire de création d'une nouvelle ressource.
     */
    public function create()
    {
        $listeL = new Location();
        $listeUser = User::all();
        $listeVehicule = Vehicule::all();
        return view('layoutsAdmin.listeLocation', ['listeL' => $listeL, 'listeUser' => $listeUser, 'listeVehicule' => $listeVehicule]);
    }

    /**
     * Stocke une nouvelle ressource dans le stockage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'lieu_depart' => 'required',
        'lieu_arrivee' => 'required',
        'date_debut' => 'required|date',
        'heure_debut' => 'required',
    ]);
    $lastLocation = Location::where('client_id', Auth::id())
    ->orderByDesc('created_at')
    ->first();

    if ($lastLocation && Carbon::now()->lessThan($lastLocation->heure_fin)) {
        return redirect()->route('Location.index')->withInput()->withErrors(['erreur' => 'Impossible de créer une nouvelle location tant que l\'heure d\'arrivée de la dernière location n\'a pas été atteinte.']);
    }

    $location = new Location();

    $location->client_id = Auth::user()->id;
    $location->lieu_depart = $validatedData['lieu_depart'];
    $location->lieu_arrivee = $validatedData['lieu_arrivee'];
    $location->date_debut = $validatedData['date_debut'];
    $location->date_fin = $request['date_fin'];
    $location->heure_debut = $validatedData['heure_debut'];
    $location->heure_fin = $request['heure_fin'];

    $location->save();

    return redirect()->route('Location.index')->with('success', 'Location ajoutée avec succès');
}


    /**
     * Affiche la ressource spécifiée.
     */
    public function show(string $id)
    {
        //
    }

   
public function edit($id)
{
    
    $vehicule = Vehicule::findOrFail($id);
    
   
    $locationL = Location::where('client_id', Auth::id())->latest()->first();
    
   
    $lastLocationId = $locationL ? $locationL->id : null;
    
   
    return view('layouts.navigation', [
        'vehicule' => $vehicule,
        'lastLocationId' => $lastLocationId,
        'locationL'=>$locationL,
    ]);
}


    
    public function update(Request $request, string $id)
    {
        $listeL = Location::find($id);

        $listeL->lieu_depart = $request->input('lieu_depart');
        $listeL->lieu_arrivee = $request->input('lieu_arrivee');
        $listeL->date_debut = $request->input('date_debut');
        $listeL->date_fin = $request->input('date_fin');
        $listeL->heure_debut = $request->input('heure_debut');
        $listeL->heure_fin = $request->input('heure_fin');

        $listeL->save();

        return redirect()->route('Location.index')->with('success', 'Location mise à jour avec succès.');
    }

    /**
     * Supprime la ressource spécifiée du stockage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function submit(Request $request)
    {
      
        $data = $request->all();
    
        
        $lieu_depart = $data['lieu_depart'] ?? null;
        $lieu_arrivee = $data['lieu_arrivee'] ?? null;
        $date_debut = $data['date_debut'] ?? null;
        $date_fin = $data['date_fin'] ?? null;
        $heure_debut = $data['heure_debut'] ?? null;
        $heure_fin = $data['heure_fin'] ?? null;

     
    
       
        $vehicleId = $request->input('vehicle_id');
    
        $lastLocationId = $request->input('last_location_id');
        
       
        $locationL = Location::where('client_id', auth()->id())->latest()->first();
    
        
        if ($locationL) {
            
            $locationL->update([
                'client_id' => auth()->id(),
                'lieu_depart' => $lieu_depart,
                'lieu_arrivee' => $lieu_arrivee,
                'date_debut' => $date_debut,
                'date_fin' => $date_fin,
                'heure_debut' => $heure_debut,
                'heure_fin' => $heure_fin,
                'vehicule_id' => $vehicleId,
            ]);
        } else {
            
            Location::create([
                'vehicule_id' => $vehicleId,
                'client_id' => auth()->id(),
                'lieu_depart' => $lieu_depart,
                'lieu_arrivee' => $lieu_arrivee,
                'date_debut' => $date_debut,
                'date_fin' => $date_fin,
                'heure_debut' => $heure_debut,
                'heure_fin' => $heure_fin,
            ]);
        }
        $vehicle = Vehicule::find($vehicleId);
        if ($vehicle) {
            $vehicle->statut = 'en_location';
            $vehicle->save();
        }
       
        return redirect()->route('Location.index')->with('success', 'La location a été mise à jour avec succès.');
    }
    
}