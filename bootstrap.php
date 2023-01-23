<?php
require_once("db/database.php");
require_once("utils/functions.php");

define("UPLOAD_DIR", "./upload/");
$dbh = new DatabaseHelper("localhost", "root", "", "footter", 3306);

?>
