<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Yobelma</title>
    <style>
        .progress.rounded-pill .progress-bar {
            border-radius: 20px;
        }
    </style>


    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{ asset('assetAdmin/css/styles.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>



</head>

<body class="sb-nav-fixed">

    @include('layoutsAdmin.header')


    @include('layoutsAdmin.sidebar')

    <main>
        <div class="container-fluid px-4 offset-2 mt-5">
            <h1 class="mt-4">Yobelema

            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        {{-- <div class="card"> --}}
                        <div class="stat-widget-two card-body">
                            <div class="stat-content">
                                <div class="stat-text fw-bold">Voiture </div>
                                <div class="stat-digit"><i class="fas fa-car"></i>
                                    {{ $nombreVehicules }}</div>
                            </div>
                            <div class="progress rounded-pill">
                                <div class="progress-bar bg-success" role="progressbar" style="width: {{ ($nombreVehicules / 100) * 100 }}%;" aria-valuenow="{{ $nombreVehicules }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                        </div>
                        {{-- </div> --}}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="stat-widget-two card-body">
                            <div class="stat-content">
                                <div class="stat-text fw-bold">Chauffeur</div>
                                <div class="stat-digit"> <i class="fas fa-user-tie"></i>

                                {{ $nombreChauffeurs }}</div>
                            </div>
                            <div class="progress rounded-pill">
                                <div class="progress-bar bg-success" role="progressbar" style="width: {{ ($nombreChauffeurs / 100) * 100 }}%;" aria-valuenow="{{ $nombreChauffeurs }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="stat-widget-two card-body">
                            <div class="stat-content">
                                <div class="stat-text fw-bold">Client</div>
                                <div class="stat-digit"><i class="fas fa-id-card"></i></i> {{ $nombreLocations }}</div>
                            </div>
                            
                            <div class="progress rounded-pill">
                                <div class="progress-bar bg-success" role="progressbar" style="width: {{ ($nombreLocations / 100) * 100 }}%;" aria-valuenow="{{ $nombreLocations }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assetAdmin/js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assetAdmin/assets/demo/chart-area-demo.js') }}"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="{{ asset('assetAdmin/js/datatables-simple-demo.js') }}"></script>

</body>

</html>
