<?php
 
require_once("bootstrap.php");
unset($_SESSION["username"]);
if(isset($_SESSION["filtra"])){
    unset($_SESSION["filtra"]);
}
header('Location: ./index.php');

?>