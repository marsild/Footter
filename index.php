<?php
require_once("bootstrap.php");
$templateParams["titolo"]= "Footer - Home";
$templateParams["nome"]="lista_post.php";
$templateParams["getPosts"]= $dbh->getPosts();
$templateParams["getSquadreTaggate"]= $dbh->getSquadreTaggate(1);
require("template/base.php");
//var_dump($dbh->getPosts());
//var_dump($dbh->getSquadreTaggate(1));

?>