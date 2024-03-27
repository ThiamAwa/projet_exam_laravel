<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use App\Models\Chauffeur;
use App\Models\Vehicule;

class homeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $nombreChauffeurs = Chauffeur::count();
        $nombreVehicules=Vehicule::count();
        $nombreLocations=Location::count();
        return view('layoutsAdmin.home',compact('nombreChauffeurs','nombreVehicules','nombreLocations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {




      

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
