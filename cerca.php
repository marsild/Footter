<?php

require_once("bootstrap.php");
if (!isUserLoggedIn()) {
    header('Location: ./index.php');
}

if (isset($_GET["search"])) {
    $templateParams["user"] = $dbh->getUsernames();
}

$templateParams["active"] = "Cerca";
$templateParams["nome"] = "form_cerca.php";
require("template/base.php");
