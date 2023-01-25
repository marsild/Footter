<?php
 
require_once("bootstrap.php");
    /*Se si sta tentando di eliminare un post */
    if(isset($_POST["eliminazione_post"])){
        // elimina commenti
        $dbh->deleteComments(intval($_POST["eliminazione_post"]));
        /*ELIMINA MI PIACE*/
        $dbh->deleteLikes(intval($_POST["eliminazione_post"]));
        // elimina riguarda
        $dbh->deleteTeamTags(intval($_POST["eliminazione_post"]));
        // elimina post 
        $dbh->deletePost(intval($_POST["eliminazione_post"]));
    }
    /*Se è stato premuto il pulsante Segui oppure Smetti di seguire*/
    if(isset($_POST["un_follow"])){
        if($_POST["un_follow"]=="Segui"){
            if (!in_array($_GET["usr"], flatArray($dbh->getSeguiti($_SESSION["username"]), "nickname_seguito"))){
                //INSERT in segue
                $dbh->insertSegue($_SESSION["username"], $_GET["usr"]);
                //UPDATE incrementa n_seguiti in profilo 1 e 2 n_follower in profilo
                $dbh->increaseFollowerSeguiti($_SESSION["username"], $_GET["usr"]);
                /* NOTIFICA */
            }
        }
        if($_POST["un_follow"]=="Smetti di seguire"){
            if (in_array($_GET["usr"], flatArray($dbh->getSeguiti($_SESSION["username"]), "nickname_seguito"))){
                //DELETE from segue
                $dbh->deleteSegue($_SESSION["username"], $_GET["usr"]);
                //UPDATE decrementa n_seguiti in profilo 1 n_seguiti e n_follower in profilo 2
                $dbh->decreaseFollowerSeguiti($_SESSION["username"], $_GET["usr"]);
            }
        }
        unset($_POST["un_follow"]);
    }
    /*Se l'username non è quello del profilo che ha effettuato il login*/
    if(isset($_GET["usr"]) &&  $_GET["usr"] != $_SESSION["username"]){
        /* Ottieni informatzioni utente */
        $templateParams["profilo"]=$dbh->getUtente($_GET["usr"])[0];
        /* Ottieni numero post utente, se non ne ha poni = 0 */
        if($dbh->getNrOfPost($_GET["usr"]) != NULL ){
            $templateParams["n_post"]=$dbh->getNrOfPost($_GET["usr"])[0];
        } else {
            $templateParams["n_post"]= 0;
        }
        /* Se l'utente è già seguito, metti testo nel pulsante "Smetti di seguire", se no "segui" */
        if (in_array($_GET["usr"], flatArray($dbh->getSeguiti($_SESSION["username"]), "nickname_seguito"))){
            $templateParams["testoPulsante"]= "Smetti di seguire";
        } else {
            $templateParams["testoPulsante"]= "Segui";
        }
        /* il pulsante riporta alla stessa pagina con lo stesso get */
        $templateParams["actionPulsante"]="profilo.php?usr=".$templateParams["profilo"]["nickname"];
        $templateParams["active"]="Profilo - ".$_GET["usr"];
    } else {
        /*Se è il profilo dell'utente loggato*/
        $templateParams["profilo"]=$dbh->getUtente($_SESSION["username"])[0];
        if($dbh->getNrOfPost($_SESSION["username"]) != NULL){
            $templateParams["n_post"]=$dbh->getNrOfPost($_SESSION["username"])[0];
        } else {
            $templateParams["n_post"]= 0;
        }
        $templateParams["testoPulsante"]="Modifica";
        $templateParams["actionPulsante"]="#";
        $templateParams["active"]="Profilo";
    }
    $templateParams["getPosts"]= $dbh->getPosts();
    $templateParams["nome"]="main_profilo.php";

    require("template/base.php");


?>