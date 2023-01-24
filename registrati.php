<?php
 
require_once("bootstrap.php");
if(isset($_POST["reg_nome"])){
    $templateParams["intestazione_loginregistrati"]="Crea il tuo account (2/2)";
    $templateParams["form_loginregistrati"]="form_registrati2.php";
} else {
    $templateParams["intestazione_loginregistrati"]="Crea il tuo account (1/2)";
    $templateParams["form_loginregistrati"]="form_registrati1.php";
}

require("template/base_loginregistrati.php");
?>