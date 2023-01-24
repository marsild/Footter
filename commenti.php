<?php
 
require_once("bootstrap.php");

if(isset($_POST["textcommento"])){
    $dbh->insertComment($_POST["textcommento"],$_SESSION["username"],$_GET["idpost"]);


}

    $templateParams["active"]="Commenti";
    $templateParams["nome"]="lista_commenti.php";
    $templateParams["getComments"]= $dbh->getComments($_GET["idpost"]);

    require("template/base.php");


?>