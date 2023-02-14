<?php

require_once("bootstrap.php");
if (!isUserLoggedIn()) {
    header('Location: ./index.php');
}
$templateParams["profilo"] = $dbh->getUtente($_SESSION["username"])[0];

if(isset($_POST["premuto"])){

    if(isset($_GET["result"]) && $_GET["result"]=="successful"){
        $templateParams["creato"] = "Dati personali modificati con successo";
    }
    
    $psw;
    $email;
    $nome;
    $cognome;
    if (empty($_POST["nome"])) {
        $nome = $templateParams["profilo"]["nome"];
    } else {
        $nome = $_POST["nome"];
    }
    if (empty($_POST["cognome"])) {
        $cognome = $templateParams["profilo"]["cognome"];
    } else {
        $cognome = $_POST["cognome"];
    }
    if (empty($_POST["agg_password"])) {
        $psw = $templateParams["profilo"]["psw"];
    } else {
         //controlla il formato password
        $correttezza_password = true;
        $uppercase = preg_match('@[A-Z]@', $_POST["agg_password"]);
        $lowercase = preg_match('@[a-z]@', $_POST["agg_password"]);
        $number = preg_match('@[0-9]@',$_POST["agg_password"]);
        $specialChars = preg_match('@[^\w]@', $_POST["agg_password"]);
        if(!$uppercase || !$lowercase || !$number || !$specialChars) {
            $templateParams["messaggio_errore_password"]="Formato password non corretto.";
            $correttezza_password = false;
        }
    if($correttezza_password==true){
        $utente = $dbh->getUtente($_SESSION["username"]);
        $psw = hash("sha512", $_POST["agg_password"].$utente[0]["salt"]);
    }else{
        $psw = $templateParams["profilo"]["psw"];
    
    }
        
    }
    if (empty($_POST["email"])) {
        $email = $templateParams["profilo"]["email"];
    } else {
        $email = $_POST["email"];
    }
    if (empty($_FILES["imgutente"]["name"])) {
        $imgContent = $templateParams["profilo"]["immagine"];
    } else {
        // Get file info 
        $fileName = basename($_FILES["imgutente"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $maxKB = 500;
        // Allow certain file formats 
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes) && $_FILES["imgutente"]["size"] < ($maxKB * 1024)) {
            $image = $_FILES['imgutente']['tmp_name'];
            $imgContent = file_get_contents($image);
        } else {
            $imgContent = $templateParams["profilo"]["immagine"];
        }
    }
    $dbh->updateProfile($imgContent, $nome, $cognome,$psw ,$email, $_SESSION["username"]);
    $templateParams["profilo"] = $dbh->getUtente($_SESSION["username"])[0];

}


$templateParams["active"] = "Impostazioni";
$templateParams["nome"] = "form_impostazioni.php";
require("template/base.php");
