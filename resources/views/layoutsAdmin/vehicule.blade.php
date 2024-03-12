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
                            <span class="h4">Gestion Vehicule</span>
                            <a href="{{ route('Vehicule.create') }}" class="btn btn-sm btn-primary float-end">Ajouter</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Photo</th>
                                        <th scope="col">Matricule</th>
                                        <th scope="col">date_achat</th>
                                        <th scope="col">km_par_defaut</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Chaffeur</th>
                                        <th scope="col">Type Vehicule</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listeV as $lv)
                                    <tr>

                                        <td scope="row">{{ $lv->id}}</td>
                                        <td>
                                            @if ($lv->photo)
                                            <a href="#" data-toggle="modal" data-target="#quickview"><img src="{{ asset('/storage/images/' .$lv->photo) }}"
                                                style="height: 50px;width:100px;"></a>
                                        @else
                                                <span>No image found!</span>
                                        @endif
                                        </td>
                                        <td>{{ $lv->matricule}}</td>
                                        <td>{{ $lv->date_achat}}</td>
                                        <td>{{ $lv->km_par_defaut}}</td>
                                        <td>{{ $lv->statut}}</td>
                                        <td>{{ $lv->chauffeur_id}}</td>
                                        <td>{{ $lv->categorie_id}}</td>

                                        <td>
                                            <a href="{{ route('Vehicule.edit',$lv) }}" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                        </td>
                                        <td>
                                            <form action="{{ route('Vehicule.destroy',$lv)}}" method="post">
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


