<?php
 
require_once("bootstrap.php");
if(!isUserLoggedIn()){
    header('Location: ./index.php');
}


if(isset($_POST["eliminazione_commento"])){
    $dbh->deleteComment($_POST["eliminazione_commento"],$_GET["idpost"]);
}


    $templateParams["active"]="Commenti";
    $templateParams["nome"]="lista_commenti.php";
    $templateParams["getComments"]= $dbh->getComments($_GET["idpost"]);

    require("template/base.php");


?>