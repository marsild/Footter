<?php
require_once("bootstrap.php");

/* Se un utente sta facendo il login */
if(isset($_POST["username"]) && isset($_POST["password"])){
    $login_result = $dbh->checkLogin($_POST["username"], $_POST["password"]);
    
    if(count($login_result)==0){
        //Login fallito
        $templateParams["errorelogin"] = "Errore! Username e/o password sbagliata.";
    }
    else{
        registerLoggedUser($login_result[0]);
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