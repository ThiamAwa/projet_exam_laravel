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



    </head>
    <body class="sb-nav-fixed">

        @include('layoutsAdmin.header')


        @include('layoutsAdmin.sidebar')

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <span class="h4">Gestion Location</span>
                            {{-- <a href="{{ route('Chauffeur.create') }}" class="btn btn-sm btn-primary float-end">Ajouter</a> --}}
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">IDClient</th>
                                        <th scope="col">lieu_depart</th>
                                        <th scope="col">lieu_d'arrive</th>
                                        <th scope="col">date_depart</th>
                                        <th scope="col">date_d'arrive</th>
                                        <th scope="col">heure_depart</th>
                                        <th scope="col">heure_d'arrivee</th>
                                        <th scope="col">Assigner vehicule</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listeL as $location)
                                    <tr>
                                        <td>{{ $location->id }}</td>
                                        <td>{{ $location->client_id }}</td>
                                        <td>{{ $location->lieu_depart }}</td>
                                        <td>{{ $location->lieu_arrivee }}</td>
                                        <td>{{ $location->date_debut }}</td>
                                        <td>{{ $location->date_fin }}</td>
                                        <td>{{ $location->heure_debut }}</td>
                                        <td>{{ $location->heure_fin }}</td>

                                        <td>{{ $location->vehicule_id }}</td>


                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
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


