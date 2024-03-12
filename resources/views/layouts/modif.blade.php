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
        <div class="row karl-new-arrivals">


                    <div class="col-12 col-sm-6 col-md-4 single_gallery_item women wow fadeInUpBig" data-wow-delay="0.2s">
                        <!-- Product Image -->
                        <div class="product-img">

                            <a href="">
                                <img src="{{ asset('/storage/images/' . $vehicule->photo) }}" class="img-fluid h-100"
                                    data-photo="{{ asset('/storage/images/' . $vehicule->photo) }}">
                            </a>

                            <div class="product-quicview">
                                <a href="" data-toggle="modal" data-target="#quickview{{ $vehicule->id }}"><i
                                        class="ti-plus"></i></a>
                            </div>
                        </div>

                        <!-- Product Description -->
                        <div class="product-description mb-3">
                            Matricule :
                            <h4 class="product-price">{{ $vehicule->matricule }}</h4>
                            {{-- <p>Jeans midi cocktail dress</p> --}}
                            <a href="#" class="add-to-cart-btn">La recommandation du jour</a>
                            <a href="{{ route('Location.index') }}" class="btn btn-danger">Detail</a>
                        </div>
                    </div>

                    <!-- Modal associé à chaque véhicule -->
                    <div class="modal fade" id="quickview{{ $vehicule->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="quickview{{ $vehicule->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <!-- Contenu de votre modal -->
                                <div class="modal-body">
                                    <div class="quickview_pro_img">
                                        <img src="{{ asset('/storage/images/' . $vehicule->photo) }}" class="img-fluid">
                                    </div>
                                    <div class="quickview_pro_des">
                                        <h4 class="title">Option de paiement</h4>
                                        <div class="top_seller_product_rating mb-15">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </div>

                                        <h5 class="price">Meilleur Prix <span>Restez flexible</span></h5>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    {{-- <form action="{{ route('Location.update',['id' => $Location->id] ) }}" method="post">

                                        @csrf
                                        @method('put')
                                        <input type="text" name="id" id="" value="{{ $location->id ? $location->id : old('id') }}">
                                        <input type="text" name="client_id" value="{{ Auth::user()->id }}">
                                        <input type="text" id="address1" class="form-control" value="{{ $location->lieu_depart ? $location->lieu_depart : old('lieu_depart') }}"
                                        name="lieu_depart" >
                                        <input type="text" id="address2" class="form-control"
                                        name="lieu_arrivee" value="{{ $location->lieu_arrivee ? $location->lieu_arrivee : old('lieu_arrivee') }}">
                                        <input type="date" class="form-control"
                                        id="departureDate" name="date_debut"
                                        value="{{ $location->date_debut ? $location->date_debut : old('date_debut') }}">
                                        <input type="time" class="form-control"
                                        name="heure_debut" id="departureTime"
                                        value="{{ $location->heure_debut ? $location->heure_debut : old('heure_debut') }}">
                                        <input type="date" class="form-control"
                                        name="date_fin"  id="arrivalDate" value="{{ $location->date_fin ? $location->date_fin : old('date_fin') }}"
                                        >
                                        <input type="time" class="form-control"
                                             name="heure_fin" id="arrivalTime" value="{{ $location->heure_fin ? $location->heure_fin : old('heure_fin') }}">
                                        <input type="text" name="vehicule_id">
                                        <button type="submit" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Enregister</button>
                                    </form> --}}
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalToggle">Detail</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
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
