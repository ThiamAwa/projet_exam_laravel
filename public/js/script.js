// let input1 = document.getElementById('form')
// let input2 = document.getElementById('to')

// let autocomplet1 = new google.maps.places.autocomplet(input1)
// let autocomplet2 = new google.maps.places.autocomplet(input2)

// let myLatLng = {
//     lat: 38.346,
//     lng: -0.4907
// }

// let mapOption = {
//     center: myLatLng,
//     zom: 7,
//     mapTypeId: google.maps.mapTypeId.ROADMAP
// }

// let map = new google.maps.Map(document.getElementById('map'),mapOption)

window.onload = function () {
    let macarte = L.map("carte").setView([48.852969, 2.349903], 13)
    // L.titlelayer('https://{s}.title.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
    //     attribution: 'donnes OpenStreetMap france',
    //     minZoom: 1,
    //     maxZoom: 20,
    // }).addTo(macarte)
    // L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(macarte);
    macarte.on("click", mapClickListen)
    document.querySelector('#dest').addEventListener("blur", getCity)
    //gestion d'itenairation

    L.Routing.control({
        geocoder: L.Control.Geocoder.nominatim(),
        LineOptions: {
            styles: [{
                color: '#839c49',
                opacity: 1,
                weight: 7,
            }]
        },
        router: new L.Routing.osrmv1({
            language: 'fr',
        })
    }).addTo(macarte)


}
function mapClickListen(e) {
    let pos = e.DepArrive
    document.querySelector("#dest").value;
    var arrivee = document.getElementById("ar").value;
}

function getCity() {
    xmlhttp.onreadystatechange = () => {
        // Si la requête est terminée
        if(xmlhttp.readyState == 4){
            // Si nous avons une réponse
            if(xmlhttp.status == 200){
                // On récupère la réponse
                let response = JSON.parse(xmlhttp.response)
            }
        }
    }
    xmlhttp.open('get', `https://nominatim.openstreetmap.org/search?q=${adresse}&format=json&addressdetails=1&limit=1&polygon_svg=1`)

    // On envoie la requête
    xmlhttp.send();


}

