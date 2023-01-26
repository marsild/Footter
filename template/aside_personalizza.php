<h6 class="text-center text-white">Filtra per</h6>
<div>
    <?php
    if (isset($_GET["filtra"])) {
        registerFilter($_GET["filtra"]);
    }
    ?>
    <?php if (isset($_SESSION["filtra"]) && $_SESSION["filtra"] == "preferiti") { ?>
        <a href="index.php?filtra=tutti" role="button" class="btn btn-link text-decoration-none text-white w-100 text-start px-0">Tutti <em class="bi bi-check-circle"></em></a>
        <a href="index.php?filtra=preferiti" role="button" class="btn btn-link text-decoration-none text-white w-100 text-start px-0">Preferiti <em class="bi bi-check-circle-fill text-info"></em></a>
    <?php } else { ?>
        <a href="index.php?filtra=tutti" role="button" class="btn btn-link text-decoration-none text-white w-100 text-start px-0">Tutti <em class="bi bi-check-circle-fill text-info"></em></a>
        <a href="index.php?filtra=preferiti" role="button" class="btn btn-link text-decoration-none text-white w-100 text-start px-0">Preferiti <em class="bi bi-check-circle"></em></a>
    <?php } ?>