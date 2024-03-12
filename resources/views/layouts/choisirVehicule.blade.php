<table class="table table-bordered">
    <tbody>
        @foreach ($listeL as $location)
            <tr>
                <td style="display: none;">{{ $location->id }}</td>
                <td style="display: none;">{{ $location->client_id }}</td>
                <td style="display: none;">{{ $location->lieu_depart }}</td>
                <td style="display: none;">{{ $location->lieu_arrivee }}</td>
                <td style="display: none;">{{ $location->date_debut }}</td>
                <td style="display: none;">{{ $location->date_fin }}</td>
                <td style="display: none;">{{ $location->heure_debut }}</td>
                <td style="display: none;">{{ $location->heure_fin }}</td>
                <td>
                    <div class="link-wrapper">
                        <a type="button" class="btn btn-success" href="{{ route('Location.edit', $location) }}">Modifier</a>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<style>
    .option-box {
        border: 1px solid #ccc;
        border-radius: 10px;

    }

    .option-content {
        font-size: 0.8rem;
        /* Ajustez la taille du texte selon vos préférences */
    }

    .checkbox {
        margin-right: 5px;
    }
</style>

<section class="new_arrivals_area section_padding_100_0 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_heading text-center">
                    <h2>Quel Vehicule choisir?</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">

    </div>

    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">DÉTAILS DU PRIX</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table>
                        <tr>
                            <th>Description</th>
                            <th class="price">Prix</th>
                        </tr>
                        <tr>
                            <td>Frais de location</td>
                            <td class="price">
                        <tr>
                            <th>Description</th>
                            <th class="price">Prix</th>
                        </tr>
                        <tr>
                            <td>Frais de location</td>
                            <td class="price">249,651.82</td>
                        </tr>
                        <tr>
                            <td>4 Jours de location </td>
                            <td class="price"> 249,651.82 XOF</td>
                        </tr>
                        <tr>
                            <td>Taxes (TVA) et frais</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Frais de location</td>
                            <td class="price">15,347.52 XOF</td>
                        </tr>
                        <tr>
                            <td>Frais de pneus et de batterie</td>
                            <td class="price">52.48 XOF
                            </td>
                        </tr>
                        <tr>
                            <td>Surtaxe Location</td>
                            <td class="price">5,108.53 XOF</td>
                        </tr>
                        <tr>
                            <td>Redevance d'immatriculation pour véhicules</td>
                            <td class="price">2,300.70 XOF</td>
                        </tr>
                        <tr>
                            <td>Redevance de recouvrement des frais Privilège</td>
                            <td class="price">25,236.56 XOF</td>
                        </tr>
                        <tr>
                            <td>Total (TTC)</td>
                            <td class="price">297,707.43 XOF</td>
                        </tr>
                    </table>


                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Femer</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Modal 2</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Hide this modal and show the first with the button below.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Back
                        to first</button>
                </div>
            </div>
        </div>
    </div>
    {{-- <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Open first modal</button> --}}

</section>



<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Récupérer toutes les images avec l'attribut data-photo
        var images = document.querySelectorAll('img[data-photo]');

        // Ajouter un gestionnaire d'événement clic à chaque image
        images.forEach(function(image) {
            image.addEventListener('click', function() {
                // Récupérer l'URL de la photo à partir de l'attribut data-photo
                var photoUrl = this.getAttribute('data-photo');

                // Remplacer le contenu du modal avec la photo cliquée
                var modalImage = document.querySelector(
                    '.modal.fade.show .quickview_pro_img img');
                modalImage.src = photoUrl;
            });
        });
    });
</script>
