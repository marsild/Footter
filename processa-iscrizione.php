<?php
 
require_once("bootstrap.php");
$dbh->insertUtente($_POST["reg_username"], $_POST["reg_nome"], $_POST["reg_cognome"], $_POST["reg_password"], $_POST["reg_email"]);

foreach($dbh->getSquads() as $squadra){
    $id_squadra = "checkbox";
    $id_squadra = $id_squadra.$squadra["nome"];
    if(isset($_POST[$id_squadra])){
        $dbh->insertPreferiti($squadra["nome"],$_POST["reg_username"]);
    }
}

header('Location: ./index.php');

?>