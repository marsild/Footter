<?php

require_once("bootstrap.php");
if(!isUserLoggedIn()){
    header('Location: ./index.php');
}
if(isset($_GET["result"]) && $_GET["result"]=="successful"){
    
    $templateParams["creato"] = 'Post pubblicato con successo. Visualizzalo nel tuo <a href="profilo.php">profilo</a>.';
}
$templateParams["active"] = "Crea";
$templateParams["nome"] = "form_creaPost.php";
$templateParams["squadre"] = $dbh->getSquads();
require("template/base.php");
