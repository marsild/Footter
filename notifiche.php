<?php
 
require_once("bootstrap.php");
if(!isUserLoggedIn()){
    header('Location: ./index.php');
}
    if(isset($_POST["eliminazione_notifica"])){
        $dbh->deleteNotifica($_POST["eliminazione_notifica"]);
    }
    $templateParams["active"]="Notifiche";
    $templateParams["nome"]="main_notifiche.php";
    $templateParams["notifiche"]= $dbh->getNotifiche($_SESSION["username"]);

    require("template/base.php");
    $dbh->updateNotificheVisualizzate($_SESSION["username"]);
?>