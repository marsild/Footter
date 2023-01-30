<?php

require_once("bootstrap.php");
if (!isUserLoggedIn()) {
    header('Location: ./index.php');
}

if (!empty($_FILES["imgutente"]["name"])) {
    // Get file info 
    $fileName = basename($_FILES["imgutente"]["name"]);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

    $maxKB = 500;
    // Allow certain file formats 
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    if (in_array($fileType, $allowTypes) && $_FILES["imgutente"]["size"] < ($maxKB * 1024)) {
        $image = $_FILES['imgutente']['tmp_name'];
        $imgContent = file_get_contents($image);
     /*   if (!isset($_POST["username"])) {
            $_POST["username"] = $templateParams["utente"]["username"];
        }
        if (!isset($_POST["nome"])) {
            $_POST["nome"] = $templateParams["utente"]["nome"];
        }
        if (!isset($_POST["cognome"])) {
            $_POST["cognome"] = $templateParams["utente"]["cognome"];
        }
        if (!isset($_POST["password"])) {
            $_POST["password"] = $templateParams["utente"]["password"];
        }
        if (!isset($_POST["email"])) {
            $_POST["email"] = $templateParams["utente"]["email"];
        }
        if (!isset($imgContent)) {
            $imgContent = $templateParams["utente"]["immagine"];
        }
        */
        

        $dbh->updateProfile($_POST["username"], $imgContent, $_POST["nome"], $_POST["cognome"], $_POST["password"], $_POST["email"], $_SESSION["username"]);
    } else {
        //non caricare immagine
    }
}
$templateParams["active"] = "Impostazioni";
$templateParams["nome"] = "form_impostazioni.php";
$templateParams["profilo"] = $dbh->getUtente($_SESSION["username"])[0];
require("template/base.php");
