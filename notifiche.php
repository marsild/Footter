<?php
 
require_once("bootstrap.php");
if(!isUserLoggedIn()){
    header('Location: ./index.php');
}

    $templateParams["active"]="Notifiche";
    $templateParams["nome"]="main_notifiche.php";
    $templateParams["notifiche"]= $dbh->getNotifiche($_SESSION["username"]);

    require("template/base.php");
    $dbh->updateNotificheVisualizzate($_SESSION["username"]);
?>