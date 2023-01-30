<?php
require_once("bootstrap.php");
if(isset($_POST["reg_email"])){
    $correttezza_password = true;
    $correttezza_username = true;
    //controlla il formato password
    /*
    $uppercase = preg_match('@[A-Z]@', $_POST["reg_password"]);
    $lowercase = preg_match('@[a-z]@', $_POST["reg_password"]);
    $number = preg_match('@[0-9]@',$_POST["reg_password"]);
    $specialChars = preg_match('@[^\w]@', $_POST["reg_password"]);
    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($_POST["reg_password"]) < 8) {
        $templateParams["messaggio_errore_password"]="Formato password non corretto (Minimo 8 caratteri di cui: 1 maiuscola, 1 numero e 1 carattere speciale.)";
        $correttezza_password = false;
    }
    */
    //controlla username già preso
    if (in_array($_POST["reg_username"], flatArray($dbh->getUsernames(), "nickname"))) {
        $templateParams["messaggio_errore_username"]="Username già utilizzato.";
        $correttezza_username = false;
    }
    //se va tutto bene passa oltre
    if($correttezza_password == true && $correttezza_username == true){
        $templateParams["intestazione_loginregistrati"]="Crea il tuo account (2/2)";
        $templateParams["form_loginregistrati"]="form_registrati2.php";
    } else {
        $templateParams["intestazione_loginregistrati"]="Crea il tuo account (1/2)";
        $templateParams["form_loginregistrati"]="form_registrati1.php";
    }
} else {
    $templateParams["intestazione_loginregistrati"]="Crea il tuo account (1/2)";
    $templateParams["form_loginregistrati"]="form_registrati1.php";
}

require("template/base_loginregistrati.php");
?>