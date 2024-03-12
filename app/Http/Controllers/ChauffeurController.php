<?php

namespace App\Http\Controllers;

use App\Models\Chauffeur;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ChauffeurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listeC=Chauffeur::All();
        return view('layoutsAdmin.chauffeur',['listeC'=>$listeC]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $listeC = new Chauffeur();
        $listeCat=Categorie::All();


        return view('layoutsAdmin.addChauffeur',
        ['listeC'=>$listeC,'listeCat'=>$listeCat]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
             // Validation des données
             $validatedData = $request->validate([
                'nom' => 'required|string',
                'prenom' => 'required|string',
                'experience' => 'required|string',
                'numero_permis' => 'required|string|unique:chauffeurs',
                'date_emission' => [
                    'required',
                    'date',
                    'before_current_date'
                ],
                'expiration' => 'required|date',
                'categorie_id' => 'c',
                'contrat' => 'required|mimes:pdf',
            ]);

            $date_emission = $validatedData['date_emission'];
            $date_systeme = now()->toDateString();

            if ($date_emission >= $date_systeme) {
                return back()->with('error', 'La date d\'émission ne peut pas être postérieure à la date actuelle du système.');
            }


            $chauffeur = new Chauffeur();
            $chauffeur->nom = $validatedData['nom'];
            $chauffeur->prenom = $validatedData['prenom'];
            $chauffeur->experience = $validatedData['experience'];
            $chauffeur->numero_permis = $validatedData['numero_permis'];
            $chauffeur->date_emission = $validatedData['date_emission'];
            $chauffeur->expiration = $validatedData['expiration'];
            $chauffeur->categorie_id = $validatedData['categorie_id'];
            $chauffeur->contrat = $validatedData['contrat'];

            $chauffeur->save();




            return redirect()->route('Chauffeur.index')->with('success', 'Chauffeur ajouté avec succès');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $listeC= new Chauffeur();
        $listeCat=Categorie::All();

        return view('layoutsAdmin.addChauffeur',['listeC'=>$listeC->find($id),'listeCat'=>$listeCat]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            // 'experience' => 'required|string',
            'numero_permis' => 'required|string|unique:chauffeurs',
            'date_emission' => 'required|date',
            'expiration' => 'required|date',
             'categorie_id' => 'nullable|exists:categories,id',
            'contrat' => 'required',


        ]);


        $chauffeur = Chauffeur::find($id);
        $chauffeur->nom = $validatedData['nom'];
        $chauffeur->prenom = $validatedData['prenom'];
        $chauffeur->experience = $validatedData['experience'];
        $chauffeur->numero_permis = $validatedData['numero_permis'];
        $chauffeur->date_emission = $validatedData['date_emission'];
        $chauffeur->expiration = $validatedData['expiration'];
        $chauffeur->categorie_id = $validatedData['categorie_id'];
        $chauffeur->contrat = $validatedData['contrat'];

        $chauffeur->save();


        return redirect()->route('Chauffeur.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Chauffeur::destroy($id);
        return to_route('Chauffeur.index');
    }
}
