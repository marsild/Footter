<!doctype html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Footter - <?php echo $templateParams["active"];?></title>
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
                <nav class="z-2 navbar fixed-top navbar-dark bg-dark">
                    <!--PULSANTE UTENTE-->
                    <button class="btn btn-link text-white" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <em class="bi bi-list"></em>
                    </button>
                    <!--MENU UTENTE-->
                    <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasNavbar">
                        <div class="offcanvas-header pb-0">
                            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menù</h5>
                            <button type="button" class="btn-close btn-close btn-close-white"
                                data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body pt-0">
                            <hr class="text-white-50">
                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                <li class="nav-item">
                                    <a class="nav-link<?php if($templateParams["active"]=="Profilo"){echo ' active" aria-current="page';}?>" href="profilo.php"><em class="bi bi-person-circle"></em> Profilo</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link<?php if($templateParams["active"]=="Preferiti"){echo ' active" aria-current="page';}?>" href="preferiti.php"><em class="bi bi-star"></em> Preferiti</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link<?php if($templateParams["active"]=="Impostazioni"){echo ' active" aria-current="page';}?>" href="impostazioni.php"><em class="bi bi-gear"></em> Impostazioni</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php"><em class="bi bi-box-arrow-left"></em> Esci</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!--TESTO CENTRALE FOOTTER ⚽️⚽️-->
                    <a class="text-decoration-none text-white fs-4" href="index.php">Footter</a>

                    <?php
                    if(isset($templateParams["pulsante_offcanvas"])){
                        require($templateParams["pulsante_offcanvas"]);
                    } else {
                        echo '<button class="btn" type="button" disabled><em class="bi bi-stars"></em></button>';
                    }
                    ?>
                </nav>
            </header>
        </div>

        <!--BOTTOM BAR MOBILE-->
        <div class="row">
            <div class="mobile d-block d-sm-none col-12">
                <nav class="z-1 fixed-bottom navbar navbar-dark bg-dark px-5 ">
                    <!--PULSANTE HOME-->
                    <a class="nav-link<?php if($templateParams["active"]=="Home"){echo ' active" aria-current="page';}?>" href="index.php" title="home">
                        <em class="bi bi-house"></em>
                    </a>
                    <!--PULSANTE SEARCH-->
                    <a class="nav-link<?php if($templateParams["active"]=="Cerca"){echo ' active" aria-current="page';}?>" href="cerca.php" title="cerca">
                        <em class="bi bi-search"></em>
                    </a>
                    <!--PULSANTE NOTIFICHE-->
                    <a class="nav-link<?php if($templateParams["active"]=="Notifiche"){echo ' active" aria-current="page';}?>" href="notifiche.php" title="notifiche">
                        <em class="bi bi-bell<?php if ($templateParams["active"]!="Notifiche" && $dbh->getNotificheNonVisualizzate($_SESSION["username"])[0]["nr"]>0){echo "-fill text-warning";} ?>"></em>
                    </a>
                    <!--PULSANTE CREA-->
                    <a class="nav-link<?php if($templateParams["active"]=="Crea"){echo ' active" aria-current="page';}?>" href="crea.php" title="crea">
                        <em class="bi bi-pencil-square"></em>
                    </a>
                </nav>
            </div>
        </div>

        <!-- DESKTOP HEADER -->
        <div class="desktop d-none d-sm-block col-sm-12">
            <header class="bg-dark py-2 fixed-top text-center">
                <!--TESTO CENTRALE FOOTTER ⚽️⚽️-->
                <a class="text-decoration-none text-white fs-4" href="index.php">Footter</a>
            </header>
        </div>
        <div class="row">
            <!--ASIDE (NAVBAR) DESKTOP-->
            <div class="desktop d-none d-sm-block col-sm-3 bg-dark px-0">
                <aside class="mt-5">
                    <ul class="nav">
                        <li class="nav-item w-100">
                            <a class="nav-link<?php if($templateParams["active"]=="Profilo"){echo ' active" aria-current="page';}?>" href="profilo.php"><em class="bi bi-person-circle"></em> Profilo</a>
                        </li>
                        <li class="nav-item w-100">
                            <a class="nav-link<?php if($templateParams["active"]=="Home"){echo ' active" aria-current="page';}?>" href="index.php"><em class="bi bi-house"></em> Home</a>
                        </li>
                        <li class="nav-item w-100">
                            <a class="nav-link<?php if($templateParams["active"]=="Cerca"){echo ' active" aria-current="page';}?>" href="cerca.php"><em class="bi bi-search"></em> Cerca</a>
                        </li>
                        <li class="nav-item w-100">
                            <a class="nav-link<?php if($templateParams["active"]=="Notifiche"){echo ' active" aria-current="page';}elseif($dbh->getNotificheNonVisualizzate($_SESSION["username"])[0]["nr"]){echo ' text-warning"';}?>" href="notifiche.php"><em class="bi bi-bell<?php if ($templateParams["active"]!="Notifiche" && $dbh->getNotificheNonVisualizzate($_SESSION["username"])[0]["nr"]>0){echo "-fill text-warning";} ?>"></em> Notifiche</a>
                        </li>
                        <li class="nav-item w-100">
                            <a class="nav-link<?php if($templateParams["active"]=="Crea"){echo ' active" aria-current="page';}?>" href="crea.php"><em class="bi bi-pencil-square"></em> Crea</a>
                        </li>
                        <li class="nav-item w-100">
                            <a class="nav-link<?php if($templateParams["active"]=="Preferiti"){echo ' active" aria-current="page';}?>" href="preferiti.php"><em class="bi bi-star"></em> Preferiti</a>
                        </li>
                        <li class="nav-item w-100">
                            <a class="nav-link<?php if($templateParams["active"]=="Impostazioni"){echo ' active" aria-current="page';}?>" href="impostazioni.php"><em class="bi bi-gear"></em> Impostazioni</a>
                        </li>
                        <li class="nav-item w-100">
                            <a class="nav-link" href="logout.php"><em class="bi bi-box-arrow-left"></em> Esci</a>
                        </li>
                    </ul>
                </aside>
            </div>

            <!--MAIN-->
            <div class="col-12 col-sm-6 px-0">

                <main class="overflow-auto mx-2 vh-100 bg-white">
                <div class="my-5 overflow-hidden">
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
                <?php
                    if(isset($templateParams["aside"])){
                        require($templateParams["aside"]);
                    }
                    ?>
                </aside>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>