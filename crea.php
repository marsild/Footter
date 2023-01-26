<?php

require_once("bootstrap.php");

if (isset($_POST["textarea"])) {
    $id_post = $dbh->insertPost($_POST["imgpost"], $_POST["textarea"], $_SESSION["username"]);
    if (isset($_POST["second-squad"])) {
        if ($_POST["first-squad"] != $_POST["second-squad"]) {
            $dbh->insertSquadsPost($id_post, $_POST["first-squad"], $_POST["second-squad"]);
        } else {
            $dbh->insertSquadsPost($id_post, $_POST["first-squad"], null);
        }
    } else {
        $dbh->insertSquadsPost($id_post, $_POST["first-squad"], null);
    }
    $templateParams["creato"] = "post creato con successo";
    //per ogni follower 
    foreach($dbh->getFollowers($_SESSION["username"]) as $utente){
        $notifica = false;
        
        //per ogni sua suqdra preferita
        foreach($dbh->getPreferiti($utente["username"]) as $squadraPreferita){
            foreach($dbh->getSquadreTaggate($id_post) as $squadraTaggata){
                if($squadraPreferita["squadra"]==$squadraTaggata["nome"]){
                    $notifica = true;
                }
            }
        }
        if($notifica==true){
            $dbh->createNotify("ha caricato un post su una delle tue squadre preferite.",$utente["username"],$_SESSION["username"],$id_post);
        }
    }
    
}
$templateParams["active"] = "Crea";
$templateParams["nome"] = "form_creaPost.php";
$templateParams["squadre"] = $dbh->getSquads();
require("template/base.php");
