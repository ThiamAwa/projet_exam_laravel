<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\User;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if(Auth::id()){
            $usertype=Auth()->user()->usertype;

            if($usertype==='admin'){
                $listeL=Location::All();
                return view('layoutsAdmin.listeLoaction',['listeL'=>$listeL]);


            }else if($usertype=='user'){
                $listeL=Location::All();
                return view('layouts.choisirVehicule',['listeL'=>$listeL]);
            }else{
              return redirect()->back();
            }
          }
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $listeL = new Location();
        $listeUser=User::All();
        $listeVehicule=Vehicule::All();



        return view('layoutsAdmin.listeLocation',
        ['listeL'=>$listeL,'listeUser'=>$listeUser,'listeVehicule'=>$listeVehicule]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     // 'client_id' => '',
        //     'lieu_depart' => 'required|string',
        //     'lieu_arrive' => 'required|string',
        //     'date_debut' => 'required',
        //     'date_fin' => 'required',
        //     'heure_fin' => 'required',
        //     'heure_debut' => 'required',


        // ]);
        // dd($validatedData);
        $Location = new Location();

        $Location->client_id = Auth::user()->id;
        $Location->lieu_depart = $request['lieu_depart'];

        $Location->lieu_arrivee = $request['lieu_arrivee'];  // Correction ici
        $Location->date_debut = $request['date_debut'];
        $Location->date_fin = $request['date_fin'];
        $Location->heure_fin = $request['heure_fin'];
        $Location->heure_debut = $request['heure_debut'];
        $Location->heure_debut = $request['heure_debut'];
        $Location->vehicule_id = $request['vehicule_id'];



        $Location->save();


            return  view('layouts.welcomUser')->with('success', 'location ajouté avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ListeL = Location::find($id);
        $listeUser = User::all();
        $listeVehicule = Vehicule::all();

        return view('layouts.modif', compact('ListeL', 'listeUser', 'listeVehicule'));
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ListeL = Location::findOrFail($id);

        $ListeL->client_id = Auth::user()->id;
        $ListeL->lieu_depart = $request['lieu_depart'];

        $ListeL->lieu_arrivee = $request['lieu_arrivee'];  // Correction ici
        $ListeL->date_debut = $request['date_debut'];
        $ListeL->date_fin = $request['date_fin'];
        $ListeL->heure_fin = $request['heure_fin'];
        $ListeL->heure_debut = $request['heure_debut'];
        $ListeL->heure_debut = $request['heure_debut'];
        $ListeL->vehicule_id = $request['vehicule_id'];


        $ListeL->save();


            return  view('layouts.sectionClient')->with('success', 'location ajouté avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
