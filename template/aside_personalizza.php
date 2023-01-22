<h6 class="text-center text-white">Filtra per</h6>
<div>
<?php
    if(isset($_GET["filtra"])){
        if ($_GET["filtra"] == "preferiti"){
            echo '<a href="index.php?filtra=tutti" role="button" class="btn btn-link text-decoration-none text-white w-100 text-start px-0">Tutti <em class="bi bi-check-circle"></em></a>';
            echo '<a href="index.php?filtra=preferiti" role="button" class="btn btn-link text-decoration-none text-white w-100 text-start px-0">Preferiti <em class="bi bi-check-circle-fill text-info"></em></a>';
        } else {
            echo '<a href="index.php?filtra=tutti" role="button" class="btn btn-link text-decoration-none text-white w-100 text-start px-0">Tutti <em class="bi bi-check-circle-fill text-info"></em></a>';
            echo '<a href="index.php?filtra=preferiti" role="button" class="btn btn-link text-decoration-none text-white w-100 text-start px-0">Preferiti <em class="bi bi-check-circle"></em></a>';
        }
    }
    else {
        echo '<a href="index.php?filtra=tutti" role="button" class="btn btn-link text-decoration-none text-white w-100 text-start px-0">Tutti <em class="bi bi-check-circle-fill text-info"></em></a>';
        echo '<a href="index.php?filtra=preferiti" role="button" class="btn btn-link text-decoration-none text-white w-100 text-start px-0">Preferiti <em class="bi bi-check-circle"></em></a>';
    }
    
?>



