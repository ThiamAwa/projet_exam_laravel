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
                    {{$listeC->exists ? "Modifier" : "Ajouter" }} Chauffeur
                </div>
                    <div class="card-body">
                        <form  action="{{route($listeC->exists ? 'Chauffeur.update' : 'Chauffeur.store',$listeC)}}" method="POST"  enctype="multipart/form-data">
                            @csrf
                            @method($listeC->exists ? "put" : "post")
                            <div class="modal-body">
                                <label for="">Nom</label>
                                <input type="text" class="block mt-1 w-full form-control"  @error('nom') is-valid @enderror name="nom" value="{{$listeC->nom ? $listeC->nom : old('nom') }}">
                                <div class="text-danger">
                                    @error('nom')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <label for="">Prenom</label>
                                <input type="text" class="block mt-1 w-full form-control"  @error('prenom') is-valid @enderror name="prenom" value="{{ $listeC->prenom ? $listeC->prenom : old('prenom') }}">
                                <div class="text-danger">
                                    @error('prenom')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <label for="">Experience</label>
                                <select  id="" class="block mt-1 w-full form-control"  @error('experience') is-valid @enderror name="experience" value="{{ $listeC->experience ?  $listeC->experience :  old('experience') }}">
                                    <option value="{{ $listeC->experience ?  $listeC->experience :  old('experience') }}"></option>
                                    <option value="Expérience de conduite sécuritaire et professionnelle">Expérience de conduite sécuritaire et professionnelle</option>
                                    <option value="Connaissance des règles de circulation">Connaissance des règles de circulation</option>
                                    <option value="Capacité à effectuer des réparations mineures">Capacité à effectuer des réparations mineures</option>
                                    <option value="Bonne connaissance géographique">Bonne connaissance géographique</option>
                                    <option value="Flexibilité et adaptabilité">Flexibilité et adaptabilité</option>
                                    <option value="Fiabilité et professionnalisme">Fiabilité et professionnalisme</option>
                                    <option value="Capacité à travailler de manière autonome">Capacité à travailler de manière autonome</option>

                                </select>

                                <div class="text-danger">
                                    @error('experience')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <label for="">numero Permis</label>
                                <input type="text" class="block mt-1 w-full form-control"  @error('numero_permis') is-valid @enderror name="numero_permis" value="{{ $listeC->numero_permis ?  $listeC->numero_permis : old('numero_permis') }}">
                                <div class="text-danger">
                                    @error('numero_permis')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <label for="">Date d'emission</label>
                                <input type="date" class="block mt-1 w-full form-control" name="date_emission" value="{{  $listeC->date_emission ? $listeC->date_emission :  \Carbon\Carbon::now()->format('Y-m-') . (new \Carbon\Carbon('first day of this month'))->format('d')  }}">
                                <div class="text-danger">
                                    @error('date_emission')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <label for="">Date d'expiration</label>
                                <input type="date" class="block mt-1 w-full form-control" name="expiration" value="{{ $listeC->expiration  ? $listeC->expiration : old('expiration') }}" readonly>
                                <div class="text-danger">
                                    @error('expiration')
                                        {{ $message }}
                                    @enderror
                                </div>
                                 <label for="">Categorie</label>
                                 <select name="categorie_id" id="" class="block mt-1 w-full form-control"  @error('categorie_id') is-valid @enderror>
                                    {{-- <option value="{{ $listeC->categorie}} {{ old('categorie') }}">Categorie</option> --}}
                                    @foreach ($listeCat as $cat )
                                    <option value="{{ $cat->id }}">{{ $cat->categorie_permis}}</option>
                                    @endforeach
                                </select>

                                <div class="text-danger">
                                    @error('categorie')
                                        {{ $message }}
                                    @enderror
                                </div>

                                <label for="">Contrat</label>
                                <input type="file" class="block mt-1 w-full form-control" name="contrat"  @error('contrat') is-valid @enderror value="{{$listeC->contrat ?  $listeC->contrat :old('contrat') }}">
                                <div class="text-danger">
                                    @error('contrat')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary" name="ajoutChauffeur">{{$listeC->exists ? "Modifier" : "Enregister" }}</button>
                            </div>
                          </form>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var dateEmissionInput = document.querySelector('input[name="date_emission"]');
                    var dateExpirationInput = document.querySelector('input[name="expiration"]');


                    dateEmissionInput.addEventListener('change', function() {
                        var dateEmission = new Date(this.value);
                        var dateExpiration = new Date(dateEmission.getFullYear() + 10, dateEmission.getMonth(), dateEmission.getDate()); // Ajoute 10 ans à la date d'émission


                        dateExpirationInput.value = dateExpiration.toISOString().slice(0,10);
                    });
                });
            </script>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('assetAdmin/js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('assetAdmin/assets/demo/chart-area-demo.js')}}"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{asset('assetAdmin/js/datatables-simple-demo.js')}}"></script>

    </body>
</html>


