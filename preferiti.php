<?php
 
require_once("bootstrap.php");
if(!isUserLoggedIn()){
    header('Location: ./index.php');
}
    $templateParams["active"]="Preferiti";
    $templateParams["nome"]="form_preferiti.php";
    $templateParams["preferiti"] = $dbh->getPreferiti($_SESSION["username"]);
    require("template/base.php");


?>