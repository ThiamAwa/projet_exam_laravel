<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Yobelma</title>

        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{asset('assetAdmin/css/styles.css')}}" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

        <link href="{{asset('asset1/lib/animate/animate.min.css')}}" rel="stylesheet">
        <link href="{{asset('asset1/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
        <link href="{{asset('asset1/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{asset('asset1/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{asset('asset1/css/style.css')}}" rel="stylesheet">



    </head>
    <body class="sb-nav-fixed">

        @include('layoutsAdmin.header')


        @include('layoutsAdmin.sidebar')

        <div class="container mt-5">
            <div class="card col-md-6 offset-3">
                <div class="card-header text-center fw-bold h5">
                    {{$listeV->exists ? "Modifier" : "Ajouter" }} Vehicule
                </div>
                <div class="card-body">
                    <form  action="{{route($listeV->exists ? 'Vehicule.update' : 'Vehicule.store',$listeV)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method($listeV->exists ? "put" : "post")
                        <div class="modal-body">

                            <label for="">Matricule</label>
                            <input type="text" class="block mt-1 w-full form-control" placeholder="exemple : AB 123 CD"  @error('matricule') is-valid @enderror name="matricule" value="{{$listeV->matricule ? $listeV->matricule : old('matricule') }}">
                            <div class="text-danger">
                                @error('matricule')
                                    {{ $message }}
                                @enderror
                            </div>


                            <label for="">Date Achat</label>
                            <input type="date" class="block mt-1 w-full form-control" @error('date_achat') is-valid @enderror name="date_achat" value="{{ $listeV->date_achat ? $listeV->date_achat : old('date_achat') }}">
                            <div class="text-danger">
                                @error('date_achat')
                                    {{ $message }}
                                @enderror
                            </div>


                            <label for="">Km par Defaut</label>
                            <input type="text" class="block mt-1 w-full form-control" @error('km_par_defaut') is-valid @enderror name="km_par_defaut" value="{{ $listeV->km_par_defaut ?  $listeV->km_par_defaut :  old('km_par_defaut') }}">
                            <div class="text-danger">
                                @error('km_par_defaut')
                                    {{ $message }}
                                @enderror
                            </div>


                            <label for="">Statut</label>
                            <select name="statut" id="" class="block mt-1 w-full form-control" valu="{{ $listeV->statut ?  $listeV->status : old('statut') }}" @error('statut') is-valid @enderror>
                                <option value="">Statut</option>
                                <option value="en_panne">en_panne</option>
                                <option value="en_service">en_service</option>
                                <option value="hors_service">hors_service</option>
                                <option value="en_location">en_location</option>

                            </select>
                            <div class="text-danger">
                                @error('statut')
                                    {{ $message }}
                                @enderror
                            </div>


                            <label for="">Chauffeur</label>
                            <select name="chauffeur_id" id="" class="block mt-1 w-full form-control" value="{{ $listeV->chauffeur_id ? $listeV->chauffeur_id : old('chauffeur_id') }}" @error('chauffeur_id') is-valid @enderror>
                                <option value="{{ $listeV->chauffeur_id}} {{ old('categorie') }}">Chaffeur</option>
                                @foreach ($listeChauf as $chauf )
                                <option value="{{ $chauf->id }}">{{ $chauf->prenom}}</option>
                                @endforeach
                            </select>
                            <div class="text-danger">
                                @error('chauffeur_id')
                                    {{ $message }}
                                @enderror
                            </div>
                            <label for="">Categorie</label>
                            <select name="categorie_id" id="" class="block mt-1 w-full form-control" @error('categorie') is-valid @enderror value="{{ $listeV->expiration ? $listeV->categorie : old('categorie') }}">
                               <option value="{{ $listeV->categorie}} {{ old('categorie') }}">Categorie</option>
                               @foreach ($listeCat as $cat )
                               <option value="{{ $cat->id }}">{{ $cat->type_vehicules}}</option>
                               @endforeach
                           </select>
                           <div class="text-danger">
                               @error('categorie_id')
                                   {{ $message }}
                               @enderror
                           </div>

                            <label for="">Photo</label>
                            <input type="file"class="form-control"  @error('photo') is-valid @enderror name="photo" id="photo"  >
                            <div class="text-danger">
                                @error('photo')
                                    {{ $message }}
                                @enderror
                            </div>
                            {{-- <img src="{{$listeV->photo ? asset('storage/images/'.$listeV->photo) : asset('storage/images/photo.png') }}" style="height: 50px;width:100px;"> --}}

                            <div class="form-check form-switch mt-3">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary" name="ajoutChauffeur">{{$listeV->exists ? "Modifier" : "Enregistrer" }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>




        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('assetAdmin/js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('assetAdmin/assets/demo/chart-area-demo.js')}}"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{asset('assetAdmin/js/datatables-simple-demo.js')}}"></script>

    </body>
</html>


