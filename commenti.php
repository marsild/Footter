<?php
 
require_once("bootstrap.php");

if(isset($_POST["textcommento"], $_POST["usr"])){
    $dbh->insertComment($_POST["textcommento"],$_SESSION["username"],$_GET["idpost"]);
    $dbh->increaseCommentsNumber($_GET["idpost"]);
    $dbh->createNotify("ha commentato il tuo post.",$_POST["usr"],$_SESSION["username"],$_GET["idpost"]);
}

    $templateParams["active"]="Commenti";
    $templateParams["nome"]="lista_commenti.php";
    $templateParams["getComments"]= $dbh->getComments($_GET["idpost"]);

    require("template/base.php");


?>