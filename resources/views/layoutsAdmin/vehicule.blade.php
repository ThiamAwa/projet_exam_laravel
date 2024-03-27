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
    <link href="{{ asset('assetAdmin/css/styles.css') }}" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <link href="{{ asset('assetCompte/css/style.css') }}" rel="stylesheet">



</head>

<body class="sb-nav-fixed">

    @include('layoutsAdmin.header')


    @include('layoutsAdmin.sidebar')

    <div class="row mt-5">
        {{-- <div class="container mt-5"> --}}
        {{-- <div class="row justify-content-center"> --}}
        {{-- <div class="col-md-12  mt-5"> --}}
        <div class="card col-md-8 offset-2">
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
                            <th scope="col">Kilometrage Actuel</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listeV as $lv)
                            <tr>

                                <td scope="row">{{ $lv->id }}</td>
                                <td>
                                    @if ($lv->photo)
                                        <a href="#" data-toggle="modal" data-target="#quickview"><img
                                                src="{{ asset('/storage/images/' . $lv->photo) }}"
                                                style="height: 50px;width:100px;"></a>
                                    @else
                                        <span>No image found!</span>
                                    @endif
                                </td>
                                <td>{{ $lv->matricule }}</td>
                                <td>{{ $lv->date_achat }}</td>
                                <td>{{ $lv->km_par_defaut }} km</td>
                                <td>
                                   {{ $lv->statut }}
                                </td>
                                
                                <td>{{ $lv->chauffeurs->prenom }} {{ $lv->chauffeurs->nom }}</td>
                                <td>{{ $lv->categories->type_vehicules }}</td>
                                <td>
                                    <button type="button" onclick="calculateDistanceK() "
                                    class="btn btn-primary btn-block"
                                    data-bs-toggle="modal"
                                    data-bs-target="#exampleModaldistance">kilometrage</button>
                                </td>

                                <td>
                                    <a href="{{ route('Vehicule.edit', $lv) }}" class="btn btn-warning"><i
                                            class="fas fa-pencil-alt"></i></a>
                                </td>
                                <td>
                                    <form action="{{ route('Vehicule.destroy', $lv) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- </div> --}}
            {{-- </div> --}}
            {{-- </div> --}}
        </div>
        <div class="col-lg-4 offset-3 mt-5 col-md-8">
            <div class="card offset-3 col-md-12">
                <div class="card-header">
                    <h4 class="card-title">Status Vehicule</h4>
                </div>
                <div class="card-body">
                    <div class="current-progress">
                        <div class="progress-content py-2">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="progress-text fw-bold">hors_service</div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="current-progressbar">
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-primary" style="width: {{ $pourcentageVehiculesHorsservice }}%;" role="progressbar" aria-valuenow="{{ $pourcentageVehiculesHorsservice }}" aria-valuemin="0" aria-valuemax="100">
                                                {{ $pourcentageVehiculesHorsservice }}%
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="progress-content py-2">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="progress-text fw-bold">en_service</div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="current-progressbar">
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-primary" style="width: {{ $pourcentageVehiculesEnService }}%;" role="progressbar" aria-valuenow="{{  $pourcentageVehiculesEnService }}" aria-valuemin="0" aria-valuemax="100">
                                                {{  $pourcentageVehiculesEnService }}%
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="progress-content py-2">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="progress-text fw-bold">en_pane</div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="current-progressbar">
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-primary" style="width: {{  $pourcentageVehiculesEnPanne  }}%;" role="progressbar" aria-valuenow="{{   $pourcentageVehiculesEnPanne  }}" aria-valuemin="0" aria-valuemax="100">
                                                {{   $pourcentageVehiculesEnPanne  }}%
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="progress-content py-2">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="progress-text fw-bold">en_location</div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="current-progressbar">
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-primary" style="width: {{  $pourcentageVehiculesEnLocation  }}%;" role="progressbar" aria-valuenow="{{   $pourcentageVehiculesEnLocation  }}" aria-valuemin="0" aria-valuemax="100">
                                                {{   $pourcentageVehiculesEnLocation  }}%
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- </div> --}}

        </div>
        <div class="modal fade" id="exampleModaldistance" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Km Actuel</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {{-- @foreach ($listeV as $lv)
                @if($lv->statut != "en_location")
                    <div>
                        <input type="text">
                    </div> --}}
                {{-- @endif     --}}
                <div id="distanceOutput">
            {{-- @endforeach --}}

                

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        let map = L.map("map").setView([14.4974, -14.4524], 6);
        var line;

        L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        // Initialiser une instance de géocodeur Nominatim
        var geocoder = L.Control.Geocoder.nominatim();

    
            // Appel à l'API Nominatim pour géocoder l'adresse
            var apiUrl = 'https://nominatim.openstreetmap.org/search?format=json&q=' + encodeURIComponent(address);

            fetch(apiUrl)
                .then(response => response.json())
                .then(data => {
                    if (data && data.length > 0) {
                        var location = {
                            lat: parseFloat(data[0].lat),
                            lon: parseFloat(data[0].lon)
                        };
                        callback(location);
                    } else {
                        callback(null, 'Coordonnées non disponibles pour l\'adresse: ' + address);
                    }
                })
                .catch(error => {
                    console.error('Erreur lors de la géocodage :', error);
                    callback(null, 'Erreur de géocodage');
                });
      

        function calculateDistanceK() {
            var address1 = document.getElementById('address1').value;
            var address2 = document.getElementById('address2').value;

            geocodeAddress(address1, function(location1, error1) {
                if (location1) {
                    geocodeAddress(address2, function(location2, error2) {
                        if (location2) {
                            if (!isNaN(location1.lat) && !isNaN(location1.lon) && !isNaN(location2.lat) && !
                                isNaN(location2.lon)) {
                                var distance = haversineDistance(location1, location2);
                                var estimatedTime = estimateTravelTime(
                                    distance);

                                var distanceOutput = document.getElementById("distanceOutput");
                                distanceOutput.innerHTML = 'La distance est parcourir est de : ' + distance
                                    .toFixed(2) + ' km';

                                var marker1 = L.marker([location1.lat, location1.lon]).addTo(map);
                                var marker2 = L.marker([location2.lat, location2.lon]).addTo(map);

                                if (line) {
                                    map.removeLayer(line);
                                }

                                line = L.polyline([
                                    [location1.lat, location1.lon],
                                    [location2.lat, location2.lon]
                                ]).addTo(map);

                                map.fitBounds(line.getBounds());

                                // Mettre à jour la date et l'heure d'arrivée après le calcul de la distance
                                updateArrivalDateTime(estimatedTime);
                            } else {
                                console.error('Coordonnées invalides');
                            }
                        } else {
                            console.error('voulez vous confimer');
                        }
                    });
                } else {
                    console.error('Adresse 1 non trouvée. Erreur : ' + error1);
                }
            });
        }

        function updateArrivalDateTime(estimatedTime) {
            var departureDate = document.getElementById('departureDate').value;
            var departureTime = document.getElementById('departureTime').value;

            if (departureDate && departureTime) {
                var departureDateTime = new Date(departureDate + 'T' + departureTime);
                var arrivalDateTime = new Date(departureDateTime.getTime() + estimatedTime * 60 * 60 * 1000);

                var arrivalDateField = document.getElementById('arrivalDate');
                var arrivalTimeField = document.getElementById('arrivalTime');

                arrivalDateField.value = arrivalDateTime.toISOString().slice(0, 10);
                arrivalTimeField.value = arrivalDateTime.toISOString().slice(11, 16);
            }
        }

        function haversineDistanceK(location1, location2) {
            var R = 6371;
            var dLat = deg2rad(location2.lat - location1.lat);
            var dLon = deg2rad(location2.lon - location1.lon);

            var a =
                Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                Math.cos(deg2rad(location1.lat)) * Math.cos(deg2rad(location2.lat)) *
                Math.sin(dLon / 2) * Math.sin(dLon / 2);

            var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
            var distance = R * c;

            return distance;
        }

        function estimateTravelTime(distance) {
            // Vous pouvez ajuster la vitesse moyenne selon vos besoins
            var averageSpeed = 70; // en km/h

            // Calculer le temps de trajet en heures
            var travelTime = distance / averageSpeed;

            return travelTime;
        }

        function deg2rad(deg) {
            return deg * (Math.PI / 180);
        }
    </script>

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
