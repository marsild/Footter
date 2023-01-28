<?php
require_once("bootstrap.php");
if(isset($_GET["user_like"])){
    $dbh->insertLike($_GET["id_like"], $_GET["user_like"]);
}
if(isset($_GET["user_dislike"])){
    $dbh->removeLike($_GET["id_dislike"], $_GET["user_dislike"]);
}
?>