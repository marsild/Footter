<!doctype html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $templateParams["titolo"];?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-dark overflow-hidden">
    <div class="container-fluid p-0 overflow-hidden">
        <!--MOBILE NAVBAR-->
        <div class="mobile d-block d-sm-none col-12">
            <header class="bg-dark">
                <!--NAVBAR-->
                <!-- navbar-static-top -->
                <nav class="z-2 navbar fixed-top navbar-dark bg-dark">
                    <!--PULSANTE UTENTE-->
                    <!--
                        <button class="btn btn-link text-dark" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list text-white" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                          </svg>
                    </button>
                    -->
                    <button class="btn btn-link text-white" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <em class="bi bi-list"></em>
                    </button>
                    <!--TESTO CENTRALE FOOTTER ⚽️⚽️-->
                    <a class="text-decoration-none text-white fs-4" href="#">Footter</a>

                    <!--PULSANTE PERSONALIZZA-->
                    <button class="btn btn-link text-white" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar2" aria-controls="offcanvasNavbar2">
                        <em class="bi bi-stars"></em>
                    </button>
                    <!--MENU UTENTE-->
                    <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasNavbar">
                        <div class="offcanvas-header pb-0">
                            <!--
                                <h5 class="offcanvas-title" id="offcanvasNavbar2Label">Menù</h5>


                                <a class="text-decoration-none text-white fs-4" href="#"><img class="rounded-circle"
                                    src="./upload/pfp.png" alt="" /> PasoLuca</a>
                            -->
                            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menù</h5>
                            <button type="button" class="btn-close btn-close btn-close-white"
                                data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body pt-0">
                            <hr class="d-lg-none text-white-50">
                            <!--
                                <li class="nav-item w-100">
                                    <a class="nav-link" href="#"><i class="bi bi-person-circle"></i></i> Profilo</a>
                                </li>
                            -->
                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><em class="bi bi-person-circle"></em> Profilo</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><em class="bi bi-star"></em> Preferiti</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><em class="bi bi-gear"></em> Impostazioni</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><em class="bi bi-box-arrow-left"></em> Esci</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--MENU PERSONALIZZA-->
                    <div class="offcanvas offcanvas-end text-bg-dark " tabindex="-1" id="offcanvasNavbar2"
                        aria-labelledby="offcanvasNavbar2Label">
                        <div class="offcanvas-header pb-0">
                            <h5 class="offcanvas-title" id="offcanvasNavbar2Label">Personalizza</h5>
                            <button type="button" class="btn-close btn-close btn-close-white"
                                data-bs-dismiss="offcanvas" aria-label="Close">
                            </button>
                            <!--inserire linee-->
                        </div>
                        <div class="offcanvas-body pt-0">
                            <hr class="d-lg-none text-white-50">
                            <h6 class="text-center">Filtra per</h6>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="filtra" id="filtra_tutti">
                                <label class="form-check-label" for="filtra_tutti">
                                    Tutti
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="filtra" id="filtra_preferiti"
                                    checked>
                                <label class="form-check-label" for="filtra_preferiti">
                                    Preferiti
                                </label>
                            </div>
                            <hr class="d-lg-none text-white-50">
                            <h6 class="text-center">Ordina per</h6>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="ordina" id="ordina_recenti">
                                <label class="form-check-label" for="ordina_recenti">
                                    Recenti
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="ordina" id="ordina_popolari" checked>
                                <label class="form-check-label" for="ordina_popolari">
                                    Popolari
                                </label>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
        </div>



        <!--BOTTOM BAR MOBILE-->
        <div class="row">
            <div class="mobile d-block d-sm-none col-12">
                <nav class="z-1 fixed-bottom navbar navbar-dark bg-dark px-5 ">
                    <!--PULSANTE HOME-->
                    <a class="nav-link active" aria-current="page" href="#" title="home">
                        <em class="bi bi-house"></em>
                    </a>
                    <!--PULSANTE SEARCH-->
                    <a class="nav-link" href="#" title="cerca">
                        <em class="bi bi-search"></em>
                    </a>
                    <!--PULSANTE NOTIFICHE-->
                    <a class="nav-link" href="#" title="notifiche">
                        <em class="bi bi-bell"></em>
                    </a>
                    <!--PULSANTE CREA-->
                    <a class="nav-link" href="#" title="crea">
                        <em class="bi bi-pencil-square"></em>
                    </a>
                </nav>
            </div>
        </div>

        <!-- DESKTOP HEADER -->
        <div class="desktop d-none d-sm-block col-sm-12">
            <header class="bg-dark py-2 fixed-top text-center">
                <!--TESTO CENTRALE FOOTTER ⚽️⚽️-->
                <a class="text-decoration-none text-white fs-4" href="#">Footter</a>
            </header>
        </div>

        <div class="row">

            <!--ASIDE (NAVBAR) DESKTOP-->
            <div class="desktop d-none d-sm-block col-sm-3 bg-dark px-0">
                <aside class="mt-5">
                    <ul class="nav">
                        <li class="nav-item w-100">
                            <a class="nav-link" href="#"><em class="bi bi-person-circle"></em> Profilo</a>
                        </li>
                        <li class="nav-item w-100">
                            <a class="nav-link active" aria-current="page" href="#"><em class="bi bi-house"></em> Home</a>
                        </li>
                        <li class="nav-item w-100">
                            <a class="nav-link" href="#"><em class="bi bi-search"></em> Cerca</a>
                        </li>
                        <li class="nav-item w-100">
                            <a class="nav-link" href="#"><em class="bi bi-bell"></em> Notifiche</a>
                        </li>
                        <li class="nav-item w-100">
                            <a class="nav-link" href="#"><em class="bi bi-pencil-square"></em> Crea</a>
                        </li>
                        <li class="nav-item w-100">
                            <a class="nav-link" href="#"><em class="bi bi-star"></em> Preferiti</a>
                        </li>
                        <li class="nav-item w-100">
                            <a class="nav-link" href="#"><em class="bi bi-gear"></em> Impostazioni</a>
                        </li>
                        <li class="nav-item w-100">
                            <a class="nav-link" href="#"><em class="bi bi-box-arrow-left"></em> Esci</a>
                        </li>
                    </ul>
                </aside>
            </div>

            <!--MAIN-->
            <div class="col-12 col-sm-6 px-0">

                <main class="overflow-auto mx-2 vh-100">
                <div class="my-5">
                    <?php
                    if(isset($templateParams["nome"])){
                        require($templateParams["nome"]);
                    }
                    ?>
                </div>
                </main>
            </div>



            <!--ASIDE (PERSONALIZZA) DESKTOP-->
            <div class="desktop d-none d-sm-block col-sm-3 bg-dark px-0">
                <aside class="mt-5">
                    <h5 class="text-white pt-1">Personalizza</h5>
                    <hr class="text-white">
                    <h6 class="text-center text-white">Filtra per</h6>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="filtra_desktop" id="filtra_tutti_desktop">
                        <label class="form-check-label text-white" for="filtra_tutti_desktop">
                            Tutti
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="filtra_desktop" id="filtra_preferiti_desktop"
                            checked>
                        <label class="form-check-label text-white" for="filtra_preferiti_desktop">
                            Preferiti
                        </label>
                    </div>
                    <hr class="text-white">
                    <h6 class="text-center text-white">Ordina per</h6>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="ordina_desktop" id="ordina_recenti_desktop">
                        <label class="form-check-label text-white" for="ordina_recenti_desktop">
                            Recenti
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="ordina_desktop" id="ordina_popolari_desktop"
                            checked>
                        <label class="form-check-label text-white" for="ordina_popolari_desktop">
                            Popolari
                        </label>
                    </div>

                </aside>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>