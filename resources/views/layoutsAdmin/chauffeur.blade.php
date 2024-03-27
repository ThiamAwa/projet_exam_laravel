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
                <div class="col-md-12 offset-3">
                    <div class="card col-md-10 mt-5">
                        <div class="card-header">
                            <span class="h4">Gestion Chauffeur</span>
                            <a href="{{ route('Chauffeur.create') }}" class="btn btn-sm btn-primary float-end">Ajouter</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Prenom</th>
                                        <th scope="col">Experience</th>
                                        <th scope="col">Numero</th>
                                        <th scope="col">emission</th>
                                        <th scope="col">expiration</th>
                                        <th scope="col">Categorie</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listeC as $lc)
                                    <tr>
                                        <td scope="row">{{ $lc->id}}</td>
                                        <td>{{ $lc->nom}}</td>
                                        <td>{{ $lc->prenom}}</td>
                                        <td>{{ $lc->experience}}</td>
                                        <td>{{ $lc->numero_permis}}</td>
                                        <td>{{ $lc->date_emission}}</td>
                                        <td>{{ $lc->expiration}}</td>
                                        <td>{{ $lc->categories->categorie_permis}}</td>
                                        <td>
                                            <a href="{{ route('Chauffeur.edit',$lc) }}" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                        </td>
                                        <td>
                                            <form action="{{ route('Chauffeur.destroy',$lc)}}" method="post">
                                                @csrf
                                                @method('delete')
                                               <button  class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </td>
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


