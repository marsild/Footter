<?php
 
require_once("bootstrap.php");

    $templateParams["active"]="Crea";
    $templateParams["nome"]="form_creaPost.php";

    $templateParams["squadre"]=$dbh->getSquads();
    require("template/base.php");


?>