<style>
    /* Styles CSS */
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .section_heading h2 {
        font-size: 24px;
        font-weight: bold;
        color: #333;
        margin-bottom: 20px;
    }

    .karl-new-arrivals .single_gallery_item {
        margin-bottom: 30px;
    }

    .product-img-with-matricule {
        position: relative;
        cursor: pointer;
    }

    .img-container {
        position: relative;
    }

    .matricule-overlay {
        position: absolute;
        bottom: 10px;
        right: 10px;
        background-color: black;
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        font-weight: bold;
        font-size: 18px;
    }

    .message-container {
        text-align: center;
        display: none;
    }

    .message-container table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #ddd;
    }

    .message-container th,
    .message-container td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .message-container th {
        background-color: #f2f2f2;
    }

    .message-container th.price,
    .message-container td.price {
        text-align: right;
    }


    .product-img-with-matricule img {
        max-width: 100%;
        height: auto;
    }


    #selectedImage {
        border: 2px solid red;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
    }


    .custom-btn-width {
        width: 200px;
    }

    .checkbox-container {
        display: flex;
        flex-direction: column;
    }

    .checkbox-item {
        cursor: pointer;
        padding: 10px;
        margin-bottom: 5px;
        border: 1px solid transparent;
    }

    .checkbox-item:hover {
        border-color: black;
        transition: border-color 0.3s ease;
    }

    .checkbox-item.checked {
        background-color: lightblue;
    }
</style>

</style>
</head>

<body>

    <section class="new_arrivals_area section_padding_100_0 clearfix mt-5">
        <div class="container">
            <div class="section_heading text-center">
                <h2>Quel Vehicule choisir?</h2>
            </div>

            <div class="row karl-new-arrivals">

                @foreach ($listeVUser as $vehicule)
                    @if ($vehicule->statut == 'en_service')
                        <div class="col-12 col-sm-6 col-md-4 single_gallery_item women wow fadeInUpBig"
                            data-wow-delay="0.2s">

                            <div class="product-img-with-matricule">
                                <a href="{{ route('Location.edit', $vehicule->id) }}"
                                    onclick="redirectWithImage(event, '{{ $vehicule->id }}')">
                                    <div class="img-container">
                                        <img src="{{ asset('/storage/images/' . $vehicule->photo) }}"
                                            class="img-fluid h-100"
                                            data-photo="{{ asset('/storage/images/' . $vehicule->photo) }}">
                                        <div class="matricule-overlay">{{ $vehicule->matricule }}</div>
                                    </div>
                                </a>
                                <div class="product-quicview">
                                    <a href=""><i class="ti-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>


    @foreach ($listeVUser as $vehicule)
        @if ($vehicule->statut == 'en_service')
            <form action="{{ route('submit') }}" method="post">
                @csrf

                <input type="hidden" name="vehicle_id" value="{{ $vehicule->id }}">
                <input type="hidden" name="last_location_id" value="{{ $lastLocationId }}">

                <input type="hidden" name="lieu_depart" placeholder="Lieu de départ"
                    value="{{ $locationL->lieu_depart ?? '' }}">
                <input type="hidden" name="lieu_arrivee" placeholder="Lieu d'arrivée"
                    value="{{ $locationL->lieu_arrivee ?? '' }}">
                <input type="hidden" name="date_debut" placeholder="Date de début"
                    value="{{ $locationL->date_debut ?? '' }}">
                <input type="hidden" name="date_fin" placeholder="Date de fin"
                    value="{{ $locationL->date_fin ?? '' }}">
                <input type="hidden" name="heure_debut" placeholder="Heure de début"
                    value="{{ $locationL->heure_debut ?? '' }}">
                <input type="hidden" name="heure_fin" placeholder="Heure de fin"
                    value="{{ $locationL->heure_fin ?? '' }}">
                <div class="container-fluid mt-5" id="imageMessageContainer" style="display: none;">
                    <div class="row">
                        <div class="col-md-6">
                            <img id="selectedImage" src="#" alt="Image sélectionnée">
                        </div>
                        <div class="col-md-6 bg-white" style="border-radius: 20px;">
                            <div class="message-container d-flex justify-content-between align-items mt-3 ">

                                <div class="checkbox-container mt-5">
                                    <h6 class="">Optient de Paiement</h6>
                                    <div class="checkbox-item mt-3">
                                        <input type="checkbox"  id="checkbox1" onchange="toggleCheckbox(this)">
                                        <label for="checkbox1">Meilleur prix</label>
                                    </div>
                                    <div class="checkbox-item mt-3">
                                        <input type="checkbox" id="checkbox2" onchange="toggleCheckbox(this)">
                                        <label for="checkbox2">Restez flexible</label>
                                    </div>


                                </div>
                                <div class="mt-5">
                                    <h6>Mode de paiement</h6>
                                    <div class="checkbox-item mt-3">
                                        <input type="checkbox" id="carte" onchange="toggleCheckbox(this)">
                                        <label for="checkbox1">
                                            <img src="{{ asset('img/carte.png') }}" alt="Logo Cartes Bancaires"
                                                style="width: 50px; height: 50px; margin-right: 10px;">
                                            Carte bancaires
                                        </label>
                                    </div>
                                    <div class="checkbox-item mt-3">
                                        <input type="checkbox" id="wave" onchange="toggleCheckbox(this)">
                                        <label for="checkbox2">
                                            <img src="{{ asset('img/wave.jpg') }}" alt="Logo Wave"
                                                style="width: 40px; height: 30px; margin-right: 10px;">
                                            Wave
                                        </label>
                                    </div>
                                    <div class="checkbox-item mt-3">
                                        <input type="checkbox" id="money" onchange="toggleCheckbox(this)">
                                        <label for="checkbox3">
                                            <img src="{{ asset('img/money.jpg') }}" alt="Logo Orange Money"
                                                style="width: 30px; height: 30px; margin-right: 10px;">
                                            Orange Money
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div id="messageBox" class="fw-bold"></div>
                            <div id="messageBox1" class="fw-bold"></div>    
                            <div class="container d-flex justify-content-between align-items-center mt-3">
                                <a class="btn btn-primary custom-btn-width" data-bs-target="#exampleModalToggle"
                                    data-bs-toggle="modal">Detail prix</a>
                                   
                                <button type="submit" class="btn btn-primary custom-btn-width">Valider</button>

                            </div>

                        </div>




                    </div>
                </div>


            </form>
        @endif
    @endforeach

    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Detail Prix</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <table>
                            <tr>
                                <th>Description</th>
                                <th class="price">Prix</th>
                            </tr>
                            <tr>
                                <td>Frais de location</td>
                                <td class="price">249,651.82</td>
                            </tr>
                            <tr>
                                <td>heure de location </td>
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
                                <td class="price">52.48 XOF</td>
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
                </div>
                <div class="modal-footer">
                    <a class="btn btn-primary" data-bs-target="#exampleModalToggle2"
                        data-bs-toggle="modal">Fermer</a>
                </div>
            </div>
        </div>
    </div>




    <!-- Script JavaScript pour effectuer la redirection -->
    <script>
        function redirectWithImage(event, lastLocationId, vehicleId) {

            event.preventDefault();


            var selectedImage = document.getElementById('selectedImage');


            var url = '/vehicule/' + vehicleId + lastLocationId;
            window.history.pushState({}, '', url);


            selectedImage.src = event.currentTarget.querySelector('img').src;


            document.getElementById('imageMessageContainer').style.display = 'block';
            document.querySelector('.message-container').style.display = 'block';


            selectedImage.style.border = '2px solid black';
            selectedImage.style.borderRadius = '5px';
            selectedImage.style.boxShadow = '0 0 5px rgba(0, 0, 0, 0.3)';


            document.getElementById('imageMessageContainer').scrollIntoView({
                behavior: 'smooth'
            });


            $.ajax({
                url: '{{ route('submit') }}',
                type: 'POST',
                data: {
                    last_location_id: lastLocationId,
                    vehicle_id: vehicleId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log(response);


                },
                error: function(xhr, status, error) {
                    console.error(error);

                }
            });
        }
    </script>
   <script>
    var optientMessage = '';
    var modeMessage = '';

    function toggleCheckbox(checkbox) {
        var messageBox = document.getElementById('messageBox');
        var messageBox1 = document.getElementById('messageBox1');

        var checkboxes = document.querySelectorAll('.checkbox-item input[type="checkbox"]');
        checkboxes.forEach(function(item) {
            if (item !== checkbox) {
                item.checked = false;
            }
        });

        if (checkbox.id === 'checkbox1' && checkbox.checked) {
            optientMessage = '20000 Franc CFA';
        } else if (checkbox.id === 'checkbox2' && checkbox.checked) {
            optientMessage = '25000 Franc CFA';
        }

        if (checkbox.id === 'carte' && checkbox.checked) {
            modeMessage = 'Votre mode de paiement par carte bancaire a été enregistré avec succès';
        } else if (checkbox.id === 'wave' && checkbox.checked) {
            modeMessage = 'Votre mode de paiement par Wave a été enregistré avec succès';
        } else if (checkbox.id === 'money' && checkbox.checked) {
            modeMessage = 'Votre mode de paiement par Orange Money a été enregistré avec succès';
        }

        messageBox.innerText = optientMessage;
        messageBox1.innerText = modeMessage;
    }
</script>

    
