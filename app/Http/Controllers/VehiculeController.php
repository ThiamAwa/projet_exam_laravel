<?php

namespace App\Http\Controllers;

use App\Models\Chauffeur;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use App\Models\Categorie;

use Illuminate\Support\Facades\Auth;


class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::id()){
            $usertype=Auth()->user()->usertype;

            if($usertype==='admin'){
                $listeV=Vehicule::All();
                return view('layoutsAdmin.vehicule',['listeV'=>$listeV]);


            }else if($usertype=='user'){
                $listeV=Vehicule::All();
              return view('layouts.navigation',['listeVUser'=>$listeV]);
            }else{
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'matricule' => 'required|string|unique:vehicules',
            'date_achat' => 'required|date',
            'km_par_defaut' => 'required|numeric',
            'statut' => 'required|string',
            'chauffeur_id' => 'nullable|exists:chauffeurs,id',
            'categorie_id' => 'required|exists:categories,id',
            'photo' => 'required|mimes:jpg,png,jpeg,gif',
        ]);

        // Vérifier si le chauffeur associé a un permis expiré
        if ($validatedData['chauffeur_id']) {
            $chauffeur = Chauffeur::find($validatedData['chauffeur_id']);
            if ($chauffeur && $chauffeur->expiration < now()) {
                return redirect()->back()->withErrors(['chauffeur_id' => 'Le permis du chauffeur est expiré.'])->withInput();
            }
        }

        // Enregistrer le fichier de la photo
        $fileName = time() . '.' . $request->photo->extension();
        $request->photo->storeAs('public/images', $fileName);

        // Créer une nouvelle instance de Vehicule avec les données validées
        $vehicule = new Vehicule();
        $vehicule->matricule = $validatedData['matricule'];
        $vehicule->date_achat = $validatedData['date_achat'];
        $vehicule->km_par_defaut = $validatedData['km_par_defaut'];
        $vehicule->statut = $validatedData['statut'];
        $vehicule->chauffeur_id = $validatedData['chauffeur_id'];
        $vehicule->categorie_id = $validatedData['categorie_id'];
        $vehicule->photo = $fileName;

        // Enregistrer le véhicule dans la base de données
        $vehicule->save();

        // Rediriger avec un message de succès
        return redirect()->route('Vehicule.index')->with('success', 'Véhicule ajouté avec succès.');
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


        return view('layouts.sectionClient',['listeV'=>$listeV->find($id),'listeChauf'=>$listeChauf]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'matricule' => 'required|string|unique:vehicules',
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
        $vehicule->matricule = $validatedData['matricule'];
        $vehicule->date_achat = $validatedData['date_achat'];
        $vehicule->km_par_defaut = $validatedData['km_par_defaut'];
        $vehicule->statut = $validatedData['statut'];
        $vehicule->chauffeur_id = $validatedData['chauffeur_id'];
        $vehicule->categorie_id = $validatedData['categorie'];
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
}
