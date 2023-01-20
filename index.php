<?php
require_once("bootstrap.php");
$templateParams["titolo"]= "Footer - Home";
$templateParams["getPosts"]= $dbh->getPosts();
require("template/base.php");
?>