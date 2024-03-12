
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calcul de Distance avec OpenStreetMap (Formulaire)</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />

    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        #map {
            height: 400px;
            width: 100%;
            margin-top: 10px;
        }

        #distanceOutput {
            margin-top: 10px;
        }

        form {
            text-align: center;
        }
    </style>
</head>

<body>
    <form>
        <label for="address1">Adresse 1:</label>
        <input type="text" id="address1" required>

        <label for="address2">Adresse 2:</label>
        <input type="text" id="address2" required>

        <label for="departureDate">Date de départ:</label>
        <input type="date" id="departureDate" required>

        <label for="departureTime">Heure de départ:</label>
        <input type="time" id="departureTime" required>

        <button type="button" onclick="calculateDistance()">Calculer Distance</button>
    </form>

    <div id="distanceOutput"></div>

    <label for="arrivalDate">Date d'arrivée:</label>
    <input type="date" id="arrivalDate" readonly>

    <label for="arrivalTime">Heure d'arrivée:</label>
    <input type="time" id="arrivalTime" readonly>

    <div id="map"></div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

    <script>
        let map = L.map("map").setView([14.4974, -14.4524], 6);
        var line;

        L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        // Initialiser une instance de géocodeur Nominatim
        var geocoder = L.Control.Geocoder.nominatim();

        function geocodeAddress(address, callback) {
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
        }

        document.getElementById('address1').addEventListener('input', function () {
            calculateDistance();
        });

        document.getElementById('address2').addEventListener('input', function () {
            calculateDistance();
        });

        document.getElementById('departureDate').addEventListener('change', function () {
            updateArrivalDateTime();
        });

        document.getElementById('departureTime').addEventListener('change', function () {
            updateArrivalDateTime();
        });

        function calculateDistance() {
            var address1 = document.getElementById('address1').value;
            var address2 = document.getElementById('address2').value;

            geocodeAddress(address1, function (location1, error1) {
                if (location1) {
                    geocodeAddress(address2, function (location2, error2) {
                        if (location2) {
                            if (!isNaN(location1.lat) && !isNaN(location1.lon) && !isNaN(location2.lat) && !isNaN(location2.lon)) {
                                var distance = haversineDistance(location1, location2);
                                var estimatedTime = estimateTravelTime(distance); // Estimation du temps de trajet en heures

                                var distanceOutput = document.getElementById("distanceOutput");
                                distanceOutput.innerHTML = 'Distance entre les adresses : ' + distance.toFixed(2) + ' km';

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
                                alert('Coordonnées invalides');
                            }
                        } else {
                            alert('Adresse 2 non trouvée. Erreur : ' + error2);
                        }
                    });
                } else {
                    alert('Adresse 1 non trouvée. Erreur : ' + error1);
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

        function haversineDistance(location1, location2) {
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
</body>

</html>

