<?php

require_once("bootstrap.php");
if(!isUserLoggedIn()){
    header('Location: ./index.php');
}
if(isset($_GET["result"])){
    
    $templateParams["creato"] = "post creato con successo";
}
$templateParams["active"] = "Crea";
$templateParams["nome"] = "form_creaPost.php";
$templateParams["squadre"] = $dbh->getSquads();
require("template/base.php");
