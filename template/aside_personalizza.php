<h6 class="text-start text-white">FILTRA PER</h6>
<?php if (isset($templateParams["active"]) && $templateParams["active"]=="Home") { ?>
    <?php
    if (isset($_GET["filtra"])) {
        registerFilter($_GET["filtra"]);
    }
    ?>
    <?php if (isset($_SESSION["filtra"]) && $_SESSION["filtra"] == "preferiti") { ?>
        <a href="index.php?filtra=tutti" role="button" class="btn btn-link text-decoration-none text-white w-100 text-start px-0"><span class="bi bi-check-circle"></span> Tutti</a>
        <a href="index.php?filtra=preferiti" role="button" class="btn btn-link text-decoration-none text-white w-100 text-start px-0"><span class="bi bi-check-circle-fill text-info"></span> Preferiti</a>
    <?php } else { ?>
        <a href="index.php?filtra=tutti" role="button" class="btn btn-link text-decoration-none text-white w-100 text-start px-0"><span class="bi bi-check-circle-fill text-info"></span> Tutti</a>
        <a href="index.php?filtra=preferiti" role="button" class="btn btn-link text-decoration-none text-white w-100 text-start px-0"><span class="bi bi-check-circle"></span> Preferiti</a>
    <?php } ?>
<?php } else { ?>
    <?php if (isset($_GET["filtra"]) && $_GET["filtra"] == "preferiti") { ?>
        <a href="profilo.php?usr=<?php echo $templateParams["profilo"]["nickname"]; ?>&filtra=tutti" role="button" class="btn btn-link text-decoration-none text-white w-100 text-start px-0"><span class="bi bi-check-circle"></span> Tutti</a>
        <a href="profilo.php?usr=<?php echo $templateParams["profilo"]["nickname"]; ?>&filtra=preferiti" role="button" class="btn btn-link text-decoration-none text-white w-100 text-start px-0"><span class="bi bi-check-circle-fill text-info"></span> Preferiti</a>
    <?php } else { ?>
        <a href="profilo.php?usr=<?php echo $templateParams["profilo"]["nickname"]; ?>&filtra=tutti" role="button" class="btn btn-link text-decoration-none text-white w-100 text-start px-0"><span class="bi bi-check-circle-fill text-info"></span> Tutti</a>
        <a href="profilo.php?usr=<?php echo $templateParams["profilo"]["nickname"]; ?>&filtra=preferiti" role="button" class="btn btn-link text-decoration-none text-white w-100 text-start px-0"><span class="bi bi-check-circle"></span> Preferiti</a>
    <?php } ?>
<?php }?>