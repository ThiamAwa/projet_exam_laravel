<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav mt-5">
                    <a class="nav-link" href="?page=accueil">
                        <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                        Accueil
                    </a>
                    <a class="nav-link mt-3" href="{{ route('Vehicule.index') }}" >
                        <div class="sb-nav-link-icon"><i class="fa fa-car"></i>
                        </div>
                       Gestions des Vehicules
                    </a>
                    <a class="nav-link mt-3" href="{{ route('Chauffeur.index') }}" >
                        <div class="sb-nav-link-icon"><i class="fa fa-user"></i>
                        </i></div>
                        Gestion des chauffeurs
                    </a>
                    <a class="nav-link" href="{{ route('Location.index') }}"  >
                        <div class="sb-nav-link-icon"><i class="fa fa-drive"></i>
                        </i></div>
                        Gestion des Location
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>

                    <a class="nav-link" href="{{ route('Tarification.index') }}" >
                        <div class="sb-nav-link-icon"><i class="fa fa-money-bill"></i>
                        </i></div>
                        Gestion des Tarifications
                    </a>

                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                Start Bootstrap
            </div>
        </nav>
    </div>

</div>
