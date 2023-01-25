<?php

require_once("bootstrap.php");

if(isset($_POST["textarea"])){
    $id_post = $dbh->insertPost($_POST["imgpost"],$_POST["textarea"],$_SESSION["username"]);
    $dbh->insertSquadsPost($id_post,$_POST["first-squad"],$_POST["second-squad"]);

}
$templateParams["active"]="Crea";
$templateParams["nome"]="form_creaPost.php";
$templateParams["squadre"]=$dbh->getSquads();
require("template/base.php");
    



?>