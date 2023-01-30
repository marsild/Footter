<?php
require_once("bootstrap.php");

/* Se un utente sta facendo il login */
if(isset($_POST["username"]) && isset($_POST["password"])){
    $utente = $dbh->getUtente($_POST["username"]);
    if(!empty($utente)){
        $psw_hash = hash("sha512", $_POST["password"].$utente[0]["salt"]);
        $login_result = $dbh->checkLogin($_POST["username"], $psw_hash);
        if(count($login_result)==0){
            //Login fallito: PASSWORD sbagliata
            $templateParams["errorelogin"] = "Errore! Username e/o password errata.";
        }
        else{
            registerLoggedUser($login_result[0]);
        }
    } else {
        //Login fallito: USERNAME non trovato
        $templateParams["errorelogin"] = "Errore! Username e/o password errata.";
    }
}

/* Se un utente ha fatto correttamente il login */
if(isUserLoggedIn()){
    /* entra */
    $templateParams["active"]="Home";
    $templateParams["nome"]="lista_post.php";
    $templateParams["aside"]="aside_personalizza.php";
    $templateParams["pulsante_offcanvas"]="offcanvas_personalizza.php";
    $templateParams["getPosts"]= $dbh->getPosts();
    require("template/base.php");
} else {
    /* se no schermata di login */
    require("login.php");
}

?>