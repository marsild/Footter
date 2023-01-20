<?php
require_once("bootstrap.php");
$templateParams["titolo"]= "Footer - Home";
$templateParams["nome"]="lista_post.php";
$templateParams["aside"]="aside_personalizza.php";
$templateParams["pulsante_offcanvas"]="offcanvas_personalizza.php";
$templateParams["getPosts"]= $dbh->getPosts();
require("template/base.php");
//var_dump($dbh->getPosts());
//var_dump($dbh->getSquadreTaggate(1));

?>