<?php
    require_once("bootstrap.php");
    if(!isUserLoggedIn()){
        header('Location: ./index.php');
    }

    /*Se si sta tentando di eliminare un post */
    if(isset($_POST["eliminazione_post"])){
        //elimina notifiche
        $dbh->deleteNotificheDiPost(intval($_POST["eliminazione_post"]));
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
                $dbh->createNotify("ha iniziato a seguirti.",$_GET["usr"],$_SESSION["username"],null );
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
        $templateParams["actionPulsante"]="impostazioni.php";
        $templateParams["active"]="Profilo";
    }

    /* style di base dei pulsanti followers/seguiti/post */
    $templateParams["bg-followers"]="fol_seg_bg border-bottom border-top";
    $templateParams["bg-seguiti"]="fol_seg_bg border-bottom border-top border-start border-end";
    $templateParams["bg-post"]="fol_seg_bg border-bottom border-top";

    /*se siamo in followers o seguiti, cambia background del rispettivo pulsante e cambia link/elenco */
    if(isset($_GET["view"])&& ($_GET["view"]=="followers" || $_GET["view"]=="seguiti")){
        if($_GET["view"]=="followers"){
            $templateParams["elenco"] = $dbh->getFollowers($templateParams["profilo"]["nickname"]);
            $templateParams["bg-followers"]="bg-white border-top";
            if($templateParams["actionPulsante"]!="impostazioni.php"){
                $templateParams["actionPulsante"] = $templateParams["actionPulsante"]."&view=followers";
            }
        } else {
            $templateParams["elenco"] = $dbh->getUtentiSeguiti($templateParams["profilo"]["nickname"]);
            $templateParams["bg-seguiti"]="bg-white border-top border-start border-end";
            if($templateParams["actionPulsante"]!="impostazioni.php"){
                $templateParams["actionPulsante"] = $templateParams["actionPulsante"]."&view=seguiti";
            }
        }
        } else {
            /* se siamo in post,
            o stiamo visualizzando l'elenco di tutti i post: in questo caso cambia background
            o stiamo visualizzando il post relativo di una notifica: cambia background solo se il nr di post totali è = 1*/
            if(!isset($_GET["post"]) || $templateParams["n_post"]["total"] == 1){
                $templateParams["bg-post"]="bg-white border-top";
            }
        }
    $templateParams["aside"]="aside_personalizza.php";
    $templateParams["pulsante_offcanvas"]="offcanvas_personalizza.php";

    //se stiamo arrivando da una notifica, carica solo la notifica del post nell'elenco dei post
    if(isset($_GET["post"])){
        $templateParams["getPosts"]= $dbh->getPost($_GET["post"]);
    } else {
        $templateParams["getPosts"]= $dbh->getPosts();
    }
    $templateParams["nome"]="main_profilo.php";
    require("template/base.php");

?>