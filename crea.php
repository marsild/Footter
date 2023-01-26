<?php

require_once("bootstrap.php");

if (isset($_POST["textarea"])) {
    $id_post = $dbh->insertPost($_POST["imgpost"], $_POST["textarea"], $_SESSION["username"]);
    if (isset($_POST["second-squad"])) {
        if ($_POST["first-squad"] != $_POST["second-squad"]) {
            $dbh->insertSquadsPost($id_post, $_POST["first-squad"], $_POST["second-squad"]);
        } else {
            $dbh->insertSquadsPost($id_post, $_POST["first-squad"], null);
        }
    } else {
        $dbh->insertSquadsPost($id_post, $_POST["first-squad"], null);
    }

    $templateParams["creato"] = "post creato con successo";
}
$templateParams["active"] = "Crea";
$templateParams["nome"] = "form_creaPost.php";
$templateParams["squadre"] = $dbh->getSquads();
require("template/base.php");
