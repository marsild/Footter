<?php
 
require_once("bootstrap.php");

if(isset($_POST["username"]) && isset($_POST["password"])){
    $login_result = $dbh->checkLogin($_POST["username"], $_POST["password"]);
    
    if(count($login_result)==0){
        //Login fallito
        $templateParams["errorelogin"] = "Errore! Credenziali errate";
    }
    else{
        registerLoggedUser($login_result[0]);
    }
}

if(isUserLoggedIn()){
    $templateParams["active"]="Home";
    $templateParams["nome"]="lista_post.php";
    $templateParams["aside"]="aside_personalizza.php";
    $templateParams["pulsante_offcanvas"]="offcanvas_personalizza.php";
    $templateParams["getPosts"]= $dbh->getPosts();
    //Login ok
    require("template/base.php");
} else {
    require("template/login.php");
}

?>