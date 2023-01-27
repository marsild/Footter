<?php
 
require_once("bootstrap.php");
if(!isUserLoggedIn()){
    header('Location: ./index.php');
}


    $templateParams["active"]="Commenti";
    $templateParams["nome"]="lista_commenti.php";
    $templateParams["getComments"]= $dbh->getComments($_GET["idpost"]);

    require("template/base.php");


?>