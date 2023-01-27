<?php
 
require_once("bootstrap.php");
/* Se un utente si è appena registrato */
if(isset($_POST["reg_username"])){
    $dbh->insertUtente($_POST["reg_username"], $_POST["reg_nome"], $_POST["reg_cognome"], $_POST["reg_password"], $_POST["reg_email"]);

    foreach($dbh->getSquads() as $squadra){
        $id_squadra = "checkbox";
        $id_squadra = $id_squadra.$squadra["nome"];
        if(isset($_POST[$id_squadra])){
            $dbh->insertPreferiti($squadra["nome"],$_POST["reg_username"]);
        }
    }
    $dbh->createNotificaIniziale("Benvenuto su Footter!", $_POST["reg_username"]);
    $login_result = $dbh->checkLogin($_POST["reg_username"], $_POST["reg_password"]);
    
    if(count($login_result)==0){
        $templateParams["errorelogin"] = "Errore durante la registrazione.";
    }
    else{
        registerLoggedUser($login_result[0]);
    }
    header('Location: ./index.php');
}


?>