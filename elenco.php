<?php 
require_once("bootstrap.php");
require_once("bootstrap.php");
if(!isUserLoggedIn()){
    header('Location: ./index.php');
}
    if($_GET["d"] == "Followers"){
        $templateParams["elenco"] = $dbh->getFollowers($_GET["u"]);
    } else {
        $templateParams["elenco"] = $dbh->getUtentiSeguiti($_GET["u"]);
    }
    
    $templateParams["active"]=$_GET["d"]." (".$_GET["u"].")";
    $templateParams["nome"]="elenco_followerseguiti.php";

require("template/base.php");


?>