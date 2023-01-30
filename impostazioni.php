<?php

require_once("bootstrap.php");
if(!isUserLoggedIn()){
    header('Location: ./index.php');
}

$templateParams["active"] = "Impostazioni";
$templateParams["nome"] = "form_impostazioni.php";
require("template/base.php");